DATE=$(shell date +%I:%M%p)
CHECK=\033[32m✔\033[39m
HR=\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#

build:
	@echo "/**\n* Bootstrap.js v2.2.1 by @fat & @mdo\n* Copyright 2012 Twitter, Inc.\n* http://www.apache.org/licenses/LICENSE-2.0.txt\n*/" > js/copyright.js
	@cat js/copyright.js js/bootstrap-transition.js js/bootstrap-alert.js js/bootstrap-button.js js/bootstrap-carousel.js js/bootstrap-collapse.js js/bootstrap-dropdown.js js/bootstrap-modal.js js/bootstrap-tooltip.js js/bootstrap-popover.js js/bootstrap-scrollspy.js js/bootstrap-tab.js js/bootstrap-typeahead.js js/bootstrap-affix.js > js/bootstrap.js
	@yuicompressor -o js/bootstrap.tmp.min.js js/bootstrap.js
	@cat js/copyright.js js/bootstrap.tmp.min.js > js/bootstrap.min.js
	@gzip -c -9 js/bootstrap.min.js > js/bootstrap.min.js.gz
	@rm js/bootstrap.tmp.min.js js/copyright.js
	@echo "Compiling and minifying javascript...       ${CHECK} Done"
	@mkdir -p css
	@lessc less/bootstrap.less > css/bootstrap.css
	@lessc less/responsive.less > css/bootstrap-responsive.css
	@yuicompressor -o css/bootstrap.min.css css/bootstrap.css
	@yuicompressor -o css/bootstrap-responsive.min.css css/bootstrap-responsive.css
	@gzip -c -9 css/bootstrap.min.css > css/bootstrap.min.css.gz
	@gzip -c -9 css/bootstrap-responsive.min.css > css/bootstrap-responsive.min.css.gz
	@echo "Compiling and minifying css...              ${CHECK} Done"