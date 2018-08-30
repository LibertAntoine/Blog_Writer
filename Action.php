<?php

    use \controller\Frontend;
    use \controller\Backend;
    use \controller\UserCRUD;
    use \controller\ArticleCRUD;
    use \controller\CommentCRUD;

class Action {  

    function __construct($action = 'NULL')
    {
        $this->go($action);     
    }

    public function go($action) {
        switch ($action) {

            case 'articlesList':
                $frontend = new Frontend();
                $frontend->articlesListView();
                break;
            case 'allArticles':
                $frontend = new Frontend();
                $frontend->allArticlesView();
                break;
            case 'biography':
                $frontend = new Frontend();
                $frontend->biographieView();
                break;
            case 'genesys':
                $frontend = new Frontend();
                $frontend->genesysVIew();
                break;
            case 'article':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $frontend = new Frontend();
                    $frontend->articleView();
                } else {
                    throw new Exception('Aucun identifiant d\'article envoyé.');
                }
                break;

            case 'acompte':
                if (isset($_SESSION['id'], $_SESSION['pseudo'])) {
                    $backend = new Backend();
                    $backend->backOfficeView();
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }    
                break;
            case 'login':
                if (!isset($_SESSION['id'], $_SESSION['pseudo'])) {
                    $backend = new Backend();
                    $backend->loginView();
                } else {
                    throw new Exception('Session déjà établie.');
                }   
                break;
            
            case 'inscription':
                if (!isset($_SESSION['id'], $_SESSION['pseudo'])) {
                $backend = new Backend();
                $backend->inscriptionView();
                } else {
                    throw new Exception('Session déjà établie.');
                }   
                break;
            case 'createArticle':
                if (isset($_SESSION['id'], $_SESSION['pseudo'])) {
                    $userCRUD = new UserCRUD();
                    $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                    if ($status === TRUE) {
                        $backend = new Backend();
                        $backend->createArticleView($_SESSION['pseudo']);
                    } else {
                        throw new Exception('Accès refusé.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;
            case 'editArticle':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $articleCRUD = new ArticleCRUD();
                    if ($articleCRUD->readArticle(intval(htmlspecialchars($_GET['id'])))) {
                        if (isset($_SESSION['id'], $_SESSION['pseudo'])) {
                            $userCRUD = new UserCRUD();
                            $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                            if ($status === TRUE) {
                                $backend = new Backend();
                                $backend->editArticleView($_GET['id']);
                            } else {
                                throw new Exception('Accès refusé.');
                            }
                        } else {
                            throw new Exception('Absence de session utilisateur.');
                        }
                    } else {
                        throw new Exception('L\'article désigné n\'existe pas.');
                    }
                } else {
                    throw new Exception('Aucun article désigné.');
                }
                break;

            case 'addArticle':
                if (isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
                    $userCRUD = new UserCRUD();
                    $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                    if ($status === TRUE) {
                        if (!empty(htmlspecialchars($_POST['title'])) AND !empty(htmlspecialchars($_POST['content']))) {
                            $articleCRUD = new ArticleCRUD();                      
                            if (!$articleCRUD->readArticle(htmlspecialchars($_POST['title']))) {
                               $article = $articleCRUD->addArticle($_SESSION['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
                                if (gettype($article) === 'object') {
                                    header('Location: index.php?action=article&id=' . $article->getId());
                                } else {
                                    throw new Exception('Impossible d\'enregister l\'article !');
                                }   
                            } else {
                                if (isset($_POST['content'])) {
                                    $content = htmlspecialchars($_POST['content']);
                                }
                                $message = 'Un article avec ce titre existe déjà, merci d\'en choisir un autre.';
                                require('view/backend/articleCreateView.php');
                            }                                  
                        } else {
                            if (isset($_POST['title'])) {
                                $articleTitle = htmlspecialchars($_POST['title']);
                            }
                            if (isset($_POST['content'])) {
                                $content = htmlspecialchars($_POST['content']);
                            }
                            $message = 'Merci de renseigné tous les champs.';
                            require('view/backend/articleCreateView.php');
                        }
                    } else {
                        throw new Exception('Accès refusé.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;
            case 'updateArticle':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    $userCRUD = new UserCRUD();
                    $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                    if ($status === TRUE) {
                            $articleCRUD = new ArticleCRUD();
                        if (!empty($_POST['title']) AND !empty($_POST['content'])) {
                            $article = $articleCRUD->readArticle(htmlspecialchars($_POST['title']));
                            if ($article === FALSE OR $article->getId() === intval($_POST['id'])) {
                                $article = $articleCRUD->updateArticle($_POST['id'], $_SESSION['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), $_POST['nbComment']);
                                if (gettype($article) === 'object') {
                                    header('Location: index.php?action=article&id=' . $article->getId());
                                } else {
                                    throw new Exception('Impossible de mettre à jour l\'article !');
                                }
                            } else {
                                $message = 'Un autre article avec ce titre existe déjà, merci d\'en choisir un autre.';
                                require('view/backend/articleEditView.php');
                            }
                        } else {
                            $article = $articleCRUD->readArticle(intval($_POST['id']));
                            $message = 'Merci de renseigné tous les champs.';
                            require('view/backend/articleEditView.php');
                        }
                    } else {
                        throw new Exception('Accès refusé.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;
            case 'deleteArticle':
            if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                $userCRUD = new UserCRUD();
                $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                if ($status === TRUE) {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $articleCRUD = new ArticleCRUD();
                        if ($articleCRUD->readArticle(intval(htmlspecialchars($_GET['id'])))) {

                            $articleCRUD = new ArticleCRUD();
                            $articleCRUD->deleteArticle(htmlspecialchars($_GET['id']));
                        } else {
                            throw new Exception('L\'article désigné n\'existe pas.');
                        }
                    } else {
                        throw new Exception('Aucun article désigné.');
                    }
                } else {
                    throw new Exception('Accès refusé.');
                }
            } else {
                throw new Exception('Absence de session utilisateur.');
            } 
                break;

            case 'addUser':
                if (!isset($_SESSION['id'], $_SESSION['pseudo'])) {
                    if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) { 
                        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
                        $_POST['mdp'] = htmlspecialchars($_POST['mdp']);   
                        if (strlen($_POST['pseudo']) <= 25 && strlen($_POST['pseudo']) >= 8 ) {
                            if (strlen($_POST['mdp']) <= 25 && strlen($_POST['mdp']) >= 8 ) {
                                $userCRUD = new UserCRUD();
                                if ($userCRUD->read($_POST['pseudo']) === 1) {
                                    $user = $userCRUD->addUser($_POST['pseudo'], $_POST['mdp']);
                                    if (gettype($user) === 'object') {
                                        $message = '';
                                        $_SESSION['pseudo'] = $user->getPseudo();
                                        $_SESSION['id'] = $user->getId();
                                        header('Location: index.php');
                                    } else {
                                        throw new Exception('Impossible d\ajouter l\'utilisateur.');
                                    }
                                } else {
                                    $message = 'L\'identifiant renseigné existe déjà, merci d\'en choisir un autre.';
                                    require('view/frontend/inscriptionView.php');
                                }
                            } else {
                                $message = 'Le mot de passe renseigné n\'est pas compris entre 8 et 25 caractères.';
                                require('view/frontend/inscriptionView.php');
                            }
                        } else {
                            $message = 'L\'indentifiant renseigné n\'est pas compris entre 8 et 25 caractères.';
                            require('view/frontend/inscriptionView.php');    
                        }
                    } else {
                        $message = 'Merci de renseigner tous les champs du formulaire.';
                        require('view/frontend/inscriptionView.php');  
                    }
                } else {
                    throw new Exception('Session déjà établie.');
                }
                break;
            case 'editPseudo':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_POST['newPseudo'])) {
                        if(strlen($_POST['newPseudo']) < 25 && strlen($_POST['newPseudo']) > 8) {
                        $userCRUD = new UserCRUD();
                        $newUser = $userCRUD->updatePseudo(htmlspecialchars($_POST['newPseudo']));
                            if (gettype($newUser) === 'object') {
                                $_SESSION['pseudo'] = htmlspecialchars($_POST['newPseudo']);
                                $message = 'Le nouveau pseudo a bien été enregistré';
                                $backend = new Backend();
                                $backend->backOfficeView($message); 
                            } else {
                                throw new Exception('Impossible de modifier l\'identifiant.');
                            }
                        } else {
                            $message = "L'identifiant doit avoir entre 8 et 25 caractères.";
                            $backend = new Backend();
                            $backend->backOfficeView($message);  
                        }
                    } else {
                        $message = "Aucun nouvel identifiant fournit.";
                        $backend = new Backend();
                        $backend->backOfficeView($message); 
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;


            case 'editMdp':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_POST['oldMdp']) AND !empty($_POST['newMdp'])) {
                        if(strlen($_POST['newMdp']) <= 25 && strlen($_POST['newMdp']) >= 8) {
                            $userCRUD = new UserCRUD();
                            $user = $userCRUD->read(htmlspecialchars($_SESSION['pseudo']), htmlspecialchars($_POST['oldMdp']));
                            if (gettype($user) === 'object') {
                                $newUser = $userCRUD->updateMdp(htmlspecialchars($_POST['newMdp']));
                                if (gettype($newUser) === 'object') {
                                    $message = 'Le nouveau mot de passe a bien été enregistré';
                                    $backend = new Backend();
                                    $backend->backOfficeView($message); 
                                } else {
                                    throw new Exception('Impossible de modifier l\'identifiant.');
                                }
                            } elseif ($user === 2) {
                                $message = 'Le mot de passe renseigné ne correspond pas à cet utilisateur.';
                                $backend = new Backend();
                                $backend->backOfficeView($message); 
                            } else {
                                throw new Exception('Impossible de lire le profil utilisateur.');
                            }
                        } else {
                            $message = "Le mot de passe doit avoir entre 8 et 25 caractères.";
                            $backend = new Backend();
                            $backend->backOfficeView($message); 
                        }
                    } else {
                        $message = "Aucun nouveau mot de passe fournit.";
                        $backend = new Backend();
                        $backend->backOfficeView($message); 
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
            break;

            case 'connexion':
                if (!isset($_SESSION['id'], $_SESSION['pseudo'])) {
                    if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
                        $message = '';
                        $userCRUD = new UserCRUD();
                        $user = $userCRUD->read(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['mdp']));
                        if (gettype($user) === 'object') {
                            $message = '';
                            $_SESSION['pseudo'] = $user->getPseudo();
                            $_SESSION['id'] = $user->getId();
                            header('Location: index.php');
                        } elseif ($user === 2) {
                            $message = 'Le mot de passe renseigné ne correspond pas à cet utilisateur.';
                            require('view/frontend/loginView.php');
                        } elseif ($user === 1) {
                            $message = 'L\'identifiant renseigné est incorrect.';
                            require('view/frontend/loginView.php');
                        } else {
                            throw new Exception('Impossible d\'effectuer l\'authentification.');
                        }
                    } else {
                        $message = 'Merci de renseigner tous les champs du formulaire.';
                        require('view/frontend/loginView.php');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;
            case 'logOut':
                $userCRUD = new UserCRUD();
                $userCRUD->logOut();
                break;

            case 'addComment':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_POST['id']) && !empty($_POST['comment'])) {
                        $commentCRUD = new CommentCRUD();
                        $commentCRUD->addComment($_SESSION['id'], $_POST['id'], htmlspecialchars($_POST['comment']));
                    } else {
                        throw new Exception('Le commentaire fournit est vide.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;
            case 'deleteComment':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_GET['id']) && !empty($_GET['article'])) {
                        $commentCRUD = new CommentCRUD();
                        $comment = $commentCRUD->readComment(intval(htmlspecialchars($_GET['id'])));
                        if ($comment !== FALSE) {
                            $userCRUD = new UserCRUD();
                            $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                            if ($status === TRUE OR $comment->getUserId() == $_SESSION['id']) {
                                $result = $commentCRUD->deleteComment(intval(htmlspecialchars($_GET['id'])), intval(htmlspecialchars($_GET['article'])));
                                if ($result === TRUE) {
                                    if (isset($_SESSION['page'])) {
                                        header('Location: '. $_SESSION['page']);
                                    } else {
                                        throw new Exception('Absence de donnée de session page.');
                                    } 
                                } else {
                                    throw new Exception('Impossible de supprimer le commentaire.');
                                }
                            } else {
                                throw new Exception('Accès refusé.');
                            }
                        } else {
                            throw new Exception('Le commentaire désigné n\'existe pas.');
                        } 
                    } else {
                        throw new Exception('Aucun commentaire désigné.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;

            case 'reporting':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_GET['id'])) {
                        $commentCRUD = new CommentCRUD();
                        $comment = $commentCRUD->readComment(intval(htmlspecialchars($_GET['id'])));
                        if ($comment !== FALSE) {
                            $report = $commentCRUD->reporting(intval(htmlspecialchars($_GET['id'])));
                            if ($report === TRUE) {
                                header('Location: index.php?action=article&id=' . $comment->getArticleId());
                            } else {
                                throw new Exception('Impossible de signaler le commentaire.');
                            }
                        } else {
                            throw new Exception('Le commentaire désigné n\'existe pas.');
                        } 
                    } else {
                        throw new Exception('Aucun commentaire désigné.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;

            case 'removeReport':
                if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                    if (!empty($_GET['id'])) {
                        $commentCRUD = new CommentCRUD();
                        $comment = $commentCRUD->readComment(intval(htmlspecialchars($_GET['id'])));
                        if ($comment !== FALSE) {
                            $userCRUD = new UserCRUD();
                            $status = $userCRUD->readAdmin($_SESSION['pseudo']);
                            if ($status === TRUE) {
                                $result = $commentCRUD->removeReport(intval(htmlspecialchars($_GET['id'])));
                                if ($result = TRUE) {
                                    header('Location: index.php?action=acompte');
                                } else {
                                    throw new Exception('Impossible de supprimer les signalements.');
                                }
                            } else {
                                throw new Exception('Accès refusé.');
                            }
                        } else {
                            throw new Exception('Le commentaire désigné n\'existe pas.');
                        } 
                    } else {
                        throw new Exception('Aucun commentaire désigné.');
                    }
                } else {
                    throw new Exception('Absence de session utilisateur.');
                }
                break;

            default:
                $frontend = new Frontend();
                $frontend->articlesListView();
                break;
        }
    }
}