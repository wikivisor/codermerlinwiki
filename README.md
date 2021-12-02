# CoderMerlin Wiki

## Pre-requisites

### Software
* PHP >= 7.4
* Mediawiki 1.35
* SemanticMediawiki >= 3
* Chameleon >= 3.4
* `composer` in your $PATH
* `git` in your $PATH

### Choose the right place
Change to the base directory of your MediaWiki installation.

## Preparatory works (optional)
Download extensions useful for the left sidebar content creation, they will be installed later:
### TreeAndMenu 
```php
git clone https://gitlab.com/organicdesign/TreeAndMenu.git extensions/TreeAndMenu
```
### SemanticResultFormats
If you do not have a "composer.local.json" file yet, create one and add the following content to it:
```php
{ 
   "require": { 
      "mediawiki/semantic-result-formats": "~3.1" 
   } 
}
```
If you already have a "composer.local.json" file add the following line to the end of the "require" section in your file:
```php
"mediawiki/semantic-result-formats": "~3.1"
```
Remember to add a comma to the end of the preceding line in this section.

Run one of the following commands in your shell depending on the way you implemented the `composer`:
```php
php composer update --no-dev
```
## Import pages
* Download [this file](import/Coder+Merlin-20211202151301.xml).
* Navigate in your browser under your wiki admin rights to https://www.codermerlin.com/wiki/index.php/Special:Import.
* Import the downloaded file with the default settings. Put `merlin` or something as wiki prefix in the import form.

See the [description of imported pages](#pages-description).

## Clone this repo
Create a local copy of this repo in the right place:
```php
git clone https://github.com/wikivisor/codermerlinwiki extensions/wikivisor
```
Add this line at the bottom of your `LocalSettings.php`:
```php
require_once( "$IP/extensions/wikivisor/LocalSettings.php" );
```
## Done
At this point everything should be in place, use `Ctrl+F5` and/or `Ctrl+Shift+r` to purge the page cache and to enjoy your new wiki layout.

## Pages description
* **MediaWiki:Chameleon.js** contains some jquery for the layout elements.
* **MediaWiki:Footer-icons** contains a menu for the footer links (facebook, twitter, etc.)
* **MediaWiki:Gadgets-definition** contains gadgets definitions obviously.
    * Gadget "Back-to-top" implements a button to scroll up. It contains:
        * **MediaWiki:Gadget-Back-to-top.css**
        * **MediaWiki:Gadget-Back-to-top.js**
        * **MediaWiki:Gadget-Back-to-top**
    * Gadget "Dark theme" is a stub for easy dark theme creation using color inversion method. It is to be adjusted after the color scheme implementation. You can test it by marking this gadget in user preferences (`Special:Preferences`). The gadget includes:
        * **MediaWiki:Gadget-Dark-theme.css**
        * **MediaWiki:Gadget-Dark-theme**
* **MediaWiki:Hf-nsfooter-** is a version of your file without footer icons and the `Designed with love in Silicon Valley` message which went to the footer.
* **MediaWiki:Hf-nsheader-** contains the content for the left sidebar.
* **MediaWiki:Newsletter-label** contains the text for the newsletter subscription link.
* **MediaWiki:Newsletter-url** contains the URL for the newsletter subscription link.
* **MediaWiki:Secondary-menu** replaces standard navigation content.
* **MediaWiki:Sidebar** is an empty version of the navigation content which is now controlled via `Mediawiki:Secondary-menu`.
* **Template:Card** provides a code and guidance for easy cards creation.
* **Template:Sitenotice** provides a code and guidance for easy banners creation.

Templates will need some re-touch when color scheme is delivered.

## ToDo
At this stage, only the layout and a couple of templates for inline elements are implemented, we expect the following to be delivered soon and included into this repo:
* Color scheme
* Top banner
* Merlin character concept (re-touched)


