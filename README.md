# 1. WeFashion

## 1.1. Table of Contents

- [1. WeFashion](#1-wefashion)
  - [1.1. Table of Contents](#11-table-of-contents)
    - [1.2.1. Projet Scolaire](#121-projet-scolaire)
  - [1.3. Commencer ](#13-commencer-)
    - [1.3.1. Pré-requis](#131-pré-requis)
    - [1.3.2. Installation](#132-installation)
    - [1.3.3. Démarrer le serveur de développement](#133-démarrer-le-serveur-de-développement)
  - [1.4. Usage](#14-usage)

### 1.2.1. Projet Scolaire

Vous venez d’être recruté comme développeur par Edouard - directeur d’une toute nouvelle
boutique de e-commerce nommé We Fashion - afin de développer leur plateforme.
We Fashion vend des vêtements homme et femme de créateurs.
Dans le futur, cette plateforme a pour but d’être multicanal : boutique en ligne ou en VR, sur
mobile, via un agent conversationnel.
C’est pour cette raison que le développement est fait en interne et n’utilise pas de système
classique de e-commerce (type magento)

## 1.3. Commencer <a name = "getting_started"></a>

Afin de lancer démarrer le projet il faudra installer les dépendances.

### 1.3.1. Pré-requis

- Créer une base de donnée nommée : **wefashion**
- Créer un ficher .env
- Copiez-y le contenue du [env.exemple](.env.example)
  - Mettre à jour les valeurs avec celles de votre configuration MAMP/XAAMP **DB_PORT** ,**DB_DATABASE** , **DB_USERNAME** ,**DB_PASSWORD**

### 1.3.2. Installation

What things you need to install the software and how to install them.

```
npm install
composer install
```

Une fois les dépendances installer :

```
php artisan migrate:fresh --seed
```

### 1.3.3. Démarrer le serveur de développement

```
php artisan serve
npm run dev
```

## 1.4. Usage
le compte administrateur est : admin@admin.com
le mot de passe est : admin
