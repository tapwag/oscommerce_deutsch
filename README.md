# oscommerce_deutsch

This project began as a fork from a package which was bundled on the oscommerce-deutsch.de website and added some small (mostly cosmetic) fixes to the package to optimise the software for a German speaking audience.

I know that osCommerce is a fairly old package but I personally found it nice to specialize in one particular shop system and learn about the internals of a Free Software eCommerce solution.

The package also includes some patches to have osCommerce running with PHP7 MySQL support as there have been some changes.

In that respect I would like to thank all the people who helped me out on https://forums.oscommerce.de/

Happy selling and happy hacking!

Maik
www.linuxandlanguages.com

# To Do Items

Spellings

* Capitalise spelling in "erwartete Artikel" to "Erwartete Artikel" 
(Adminsection)
* Capitalise spelling in "akzeptierte Zahlungsweisen" (Admin -> Module - 
Boxes)
* Capitalise "Admin" -> "Konfiguration" -> "Untere Werte" -> "meist 
verkaufte Produkte"
* Capitalise "Admin" -> "Konfiguration" -> "Seo Urls 5"
* Translate "Admin"-> "Boxes" to "Kästen"

Administration/Upgrade
* Integrate Upgrade from Upstream 2.3.4.1
* On Ubuntu 14.04 the default configuration for directory indexes is 
true and osCommerce doesn't seem to consider the .htaccess files 
supplied by the package
* Creating on an installation script to simplify installation
* Ubuntu's Apache2 configuration seems to have Apache Options to be enabled by default -> Set Options -Indexes automatically
