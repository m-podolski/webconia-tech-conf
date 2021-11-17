# Webconia Technology Conference (Demo)

This project is a simple website that validates form entries using PHP and SQL, stores them in a MariaDB / MySQL database and displays them. In addition, the registration form has an effective and user-friendly front-end validation.

![Screencast](./screencast.gif)

## About the code

src/controllers/**form.php** is the central part of this project. It handles all of sanitization, validation and database input.

## User Story

We have decided that we would like to invite all of our customers to this year's WTC (Webconia Technology Conference). In order to determine the number of participants and to communicate a final date, we need a website on which our customers can register to participate in the WTC 2021.

The website should be developed in PHP and connected to an SQL database. For a registration we need: first name, last name, e-mail, company.

## Setup

1. After putting the project on your server, open `config.php` and configure **PROJECT_DIR** and **DB_CONFIG** for your setup. These are needed for all the paths and the database access to work.

1. Assets have to be processed into a `dist` directory. **Gulp** is already set up to do this. After installing the dependencies via `yarn install` you can start development-mode with `yarn run start` or create production files with `yarn run build`. (Both will use the locally installed **Gulp-CLI** via `npx`). If you have named your project directory something other than `webconia` you must change browser-syncs proxy adress in `gulpfile.js` in `sync()` accordingly.

1. To setup the database you can either use the dump-file `webconia.sql` which contains example data or press the button **DB-Setup** right below the registration form to create a fresh database and table.

1. My formatting needs VS Code to have two extensions to be installed: **esbenp.prettier-vscode** and **rifi2k.format-html-in-php**. The latter is the best solution for formatting PHP-templates I could find.

## Hints

- For convenience the registrated users can be shown via a button on the confirmation page. This would of course be behind a login in production.

## Image Credits

<a href="https://unsplash.com/@meduana?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Meduana</a> on <a href="https://unsplash.com/s/photos/hamburg?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@xteemu?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Teemu Paananen</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@myleon?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Leon</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@plhnk?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Paul Hanaoka</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@juvnsky?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Anton Maksimov juvnsky</a> on <a href="https://unsplash.com/s/photos/technology?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@christianw?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Christian Wiediger</a> on <a href="https://unsplash.com/s/photos/computer?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
