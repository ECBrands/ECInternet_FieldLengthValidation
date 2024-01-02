==========================================
# ECInternet_FieldLengthValidation Module
==========================================

The ECInternet_FieldLengthValidation module allows admin user to manage the character limit on input fields
such as Firstname, Lastname, Companyname, Telephone, Street, City etc.
If a website user enter the characters more than the preset limit, a warning will appear to the user accordingly.

==========================================
## Installation Instructions
==========================================

* Connect to your website source folder with FTP/SFTP/SSH and upload all the extension files and folders to the root folder of your Magento installation:

* Please use the "Merge" upload mode. Do not replace the whole folders, but merge them. This way your FTP/SFTP client will only add new files. This mode is used by default by most of FTP/SFTP client’s software. For MacOS it’s recommended to use Transmit.

* Run following commands from the root folder of your Magento Installation:
```bash
$ php bin/magento setup:upgrade
$ php bin/magento setup:static-content:deploy -f
```
