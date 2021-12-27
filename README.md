# CoderMerlin Wiki

## Pre-requisites

* PHP >= 7.4
* Mediawiki 1.35
* Mediawiki extensions
  * SemanticMediawiki >= 3
  * SemanticResultFormats >=3
  * Gadgets (bundled)
* Mediawiki skins
  * Chameleon >= 3.4
* `composer` in your $PATH
* `git` in your $PATH

### Choose the right place
Change to the base directory of your MediaWiki installation.

## Preparatory works
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
### Gadgets
Make sure that Gadgets extension is in the `extensions` directory. It should be bundled with MediaWiki.

## Clone this repo
Create a local copy of this repo in the right place:
```php
git clone https://github.com/wikivisor/codermerlinwiki extensions/wikivisor
```
Add this line at the bottom of your `LocalSettings.php`:
```php
require_once( "$IP/extensions/wikivisor/LocalSettings.php" );
```
Some notes may be found in the added [LocalSettings.php](LocalSettings.php) file.

## Import pages
* Import [files in import directory](import):
```php
php maintenance/importDump.php < extensions/wikivisor/import/TemplateMediawikiWidgetPropertyNS-20211214232549.xml
php maintenance/importDump.php < extensions/wikivisor/import/TemplateExamplesDescriptions-20211227171148.xml
php maintenance/importDump.php < extensions/wikivisor/import/WelcomeToCodeMerlin.xml
php maintenance/importDump.php < extensions/wikivisor/import/MultipageNavigation.xml
```
The first one is mandatory. The second contains the proposed mainpage layout (optional). The last one contains data structure and workflow for the multipage navigation. Shell and Number systems multipage experiences included. (optional). 
See the [description of imported pages](#pages-description) for details.

Import images used in templates:
```php
php maintenance/importImages.php extensions/wikivisor/images/ png
```
## Done
At this point everything should be in place, use `Ctrl+F5` and/or `Ctrl+Shift+r` to purge the page cache and to enjoy your new wiki layout.

## Pages description
This is a description of the [Coder+Merlin-20211202151301.xml](import/Coder+Merlin-20211202151301.xml) contents.
* **MediaWiki:Chameleon.css** contains provisional style changes.
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
* **Template:Bquote** provides styled quotes / citations divs.

The following **existing** templates and widgets contain design elements re-touched / adapted for use with the Bootstrap and the design under development:

* Template:BestPractice
* Template:CM
* Template:CommandPlaceholder
* Template:Command
* Template:Caution
* Template:ConsoleLines
* Template:ConsoleLine
* Template:Excursion
* Template:Exercises
* Template:GoingDeeper
* Template:Hint
* Template:Key
* Template:KeyConcepts
* Template:KeySequence
* Template:MerlinBlurbs
* Template:MerlinQuotes
* Template:MerlinRecommends
* Template:MerlinVideoPlayer
* Template:Observe
* Template:Question
* Template:SpecialKey
* Template:VerySpecialKey
* Widget:MerlinVideoPlayer

Templates are work in progress.

## ToDo
At this stage, only the layout and a couple of templates for inline elements are implemented, we expect the following to be delivered soon and included into this repo:
* Complete Dark theme
* Provide styling guidance
