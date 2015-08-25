# [BootPress](http://bootpress.larsschweisthal.de)

## Version: 0.2.7 (2015-08-25)
WordPress Theme based on Twitter Bootstrap.

### Installation
- Install [Wordpress](https://de.wordpress.org/)
- Clone or fetch into `wp-content/themes`
  ```
  git clone git@github.com:pennywise81/BootPress.git bootpress-dev
  ```

You're good to go. If you want to run Grunt tasks, you have to install [npm](https://nodejs.org/), [grunt](http://gruntjs.com/getting-started), [bower](http://bower.io/#install-bower), [ruby](http://rubyinstaller.org/) and [SASS](http://sass-lang.com/install). After installation, run the following commands in `bootpress-dev`:

- `npm install`
- `bower install`
- `grunt build` (e.g., for a list of all tasks check `Gruntfile.js`)

### Changelog
- [x] implemented template-part for navigation toggle
- [x] removed above the fold for now, needs more attention
- [x] changed paths in SCSS due to compile error
- [x] base64 encoded the brand image default
- [x] performance enhancements
- [x] split "above the fold" and other CSS
- [x] removed WordPress's Emoji functions
- [x] working versioning system
- [x] release and development version

### Upcoming majors
- [ ] drag and drop designer for posts and pages
- [ ] script-/style concatenation, minification
- [ ] multilanguage support

### Upcoming minors
- [ ] improve "above the fold" CSS
- [ ] disable/enable footer
- [ ] implement responsive images
- [ ] general performance tweaks
- [ ] enable buttons, icons, tables, jumbotron in WYSIWYG

### Known bugs
- [ ] the scrollbar is jumping on long pages