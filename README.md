# Webconia Technology Conference (Demo)

## Webconia Programmieraufgabe 1

### User Story

Wir haben beschlossen, dass wir alle unsere Kunden zur diesjährigen WTC (webconia Technology Conference) einladen möchten. Um die Anzahl an Teilnehmern zu bestimmen und einen finalen Termin mitzuteilen, benötigen wir eine Webseite, auf welcher sich unser Kunde für die Teilnahme an der WTC 2021 einschreiben kann.

Die Webseite sollte dabei in PHP entwickelt und an eine SQL Datenbank angebunden sein. Darüber hinaus würden wir uns freuen, wenn uns der Code über Github zur Verfügung gestellt wird, dies ist jedoch optional.
Für eine Einschreibung benötigen wir:
- Vorname
- Nachname
- E-Mail
- Firma

### Setup

1. After putting the project on your server, open `config.php` and configure **PROJECT_DIR** and **DB_CONFIG** for your setup. These are needed for all the paths and the database access to work.

1. Assets like client-side Javascript, CSS and Images have to be processed into a `dist` directory. **Gulp** is already set up to do this. After installing all dependencies via **Yarn** you can start development / watch-mode with `yarn run start` or create production files with `yarn run build` in the command line. (Both will use the locally installed **Gulp-CLI** via `npx`)

1. To setup the database you can either use the dump-file `webconia.sql` which contains example data or press the button **DB-Setup** right below the registration form to create a fresh database and table.

1. My formatting needs VS Code to have two extensions to be installed: **esbenp.prettier-vscode** and **rifi2k.format-html-in-php**. The latter is the best solution for formatting PHP-templates I could find.

### Hints

- For convenience the registrated users can be shown via a button on the confirmation page. This would of course be behind a login in production.

### Image Credits

<a href="https://unsplash.com/@meduana?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Meduana</a> on <a href="https://unsplash.com/s/photos/hamburg?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@xteemu?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Teemu Paananen</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@myleon?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Leon</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@plhnk?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Paul Hanaoka</a> on <a href="https://unsplash.com/s/photos/conference?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@juvnsky?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Anton Maksimov juvnsky</a> on <a href="https://unsplash.com/s/photos/technology?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

<a href="https://unsplash.com/@christianw?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Christian Wiediger</a> on <a href="https://unsplash.com/s/photos/computer?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
