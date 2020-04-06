
# Main Functionalities

### Inprogress
* Allow customers to choose delivery date and time
* Display Delivery Date & Time 

### Todo
* Set intervals between order and delivery dates
* Display Scheduler on the Product Page and at Checkout
* Same day delivery with custom charges & cut-off time
* Custom Delivery Option for Magento Customer Groups
* Choose Date & Time format  
* Keep a track of Delivery Orders
* Display Delivery Date & Time with an additional charge 
       
              
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

