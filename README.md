# :notebook_with_decorative_cover: Blog-Writer

<p align="center">
<img src="doc/readme-img/Blog-Writer.png?raw=true" width="100%" alt="Blog-Writer">
</p>

## Table of Contents

- [**Configuration**](#Configuration)
  * [**Clone repository**](#clone-repository)
  * [**Install**](#install)
- [**Presentation**](#presentation)
- [**Main Features**](#main-features)


## Configuration 
### Clone repository 
In the local folder for the project
```bash
	git clone https://github.com/LibertAntoine/Blog_Writer.git
```
### Install
* Add tables to a database via .sql files at the root. 
* Place the php architecture on your server. 
* Configure in model/DBAccess.php the access identifiers to your database.

## Presentation
<p>
Blog-Writer is a website presenting a blog template for a writer who regularly publishes articles, or chapters of his stories. The site is based on a Jquery frontend and a PHP / MySQL backend, with an MVC architecture, storing articles, comments and user accounts. It is possible from a backoffice to write new articles and to comment on articles when connected, via an editor based on TinyMCE.
</p>
<p>
It is possible to access the administrator area and create new articles with the username / password: Jean Forteroche / Jean Forteroche.
</p>
<p>
This project is an initiative resulting from my validation of knowledge carried out on Openclassrooms in 2018.
</p>

Realized in June 2018.

[**See website**](https://blog-ecrivain.antoine-libert.com/)

<p align="center">
<img src="doc/readme-img/Blog-Writer2.png?raw=true" width="45%" alt="Screenshot">
<img src="doc/readme-img/Blog-Writer3.png?raw=true" width="45%" alt="Screenshot">
</p>


## Main Features
* PHP / MySQL backend, MVC architecture.
* User account and authentication.
* Backoffice with a TinyMCE editor for article writing.
