# Ace OrderDeliveryDate
       
                ``ace/module-orderdeliverydate``
                     
               [Main Functionalities](#markdown-header-main-functionalities)
               [Installation](#markdown-header-installation)
                     [Configuration](#markdown-header-configuration)
               [Specifications](#markdown-header-specifications)
               [Attributes](#markdown-header-attributes)
                     
              
       # Main Functionalities
       
              
       # Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Ace`
 - Enable the module by running `php bin/magento module:enable Ace_OrderDeliveryDate`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require ace/module-orderdeliverydate`
 - enable the module by running `php bin/magento module:enable Ace_OrderDeliveryDate`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Enable (orderdeliverydate/general/enabled)

 - Processing Time (orderdeliverydate/general/processingtime)

 - Display At (orderdeliverydate/general/displayat)

 - Time Slots (orderdeliverydate/general/timeslots)

 - Date Format (orderdeliverydate/general/dateformat)

 - Icon Calendar (orderdeliverydate/general/iconcalendar)


## Specifications




## Attributes

 - Sales - delivery_timeslot (delivery_timeslot)

 - Sales - delivery_date (delivery_date)

