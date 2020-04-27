
# Main Functionalities

#### For Customer:
* Pick up the expected delivery date and time on the checkout
* Pick up Time Slots for delivery Date
* Manage Position for Delevery Date 
    * Shipping Address
    * Shipping Method
    * Review & Payments

* Manage Date Format 
    * mm/dd/yy (ex: 12/05/2020)
    * dd-mm-yy (ex: 05-12-2020) 
    * yy-mm-dd (ex: 2020-12-05)


#### For Admin:
* Exclude specific day/time from the delivery date based on the availability (toDo)
* Edit and add order delivery date to related documents (orders, invoices, email, etc.) (toDo)
* Support API order attributes (toDo)


### Inprogress
* Leave additional information/note for the merchant in delivery comment
* Manage Processing Time

### Todo
* Set intervals between order and delivery dates
* Display Scheduler on the Product Page and at Checkout
* Same day delivery with custom charges & cut-off time
* Custom Delivery Option for Magento Customer Groups
* Keep a track of Delivery Orders
* Display Delivery Date & Time with an additional charge 
* Manage Calendar Icon
       
              
# Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Ace`
 - Enable the module by running `php bin/magento module:enable Aceextensions_OrderDeliveryDate`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require aceextensions/module-orderdeliverydate`
 - enable the module by running `php bin/magento module:enable Aceextensions_OrderDeliveryDate`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Enable (orderdeliverydate/general/enabled)

 - Processing Time (orderdeliverydate/general/processingtime)

 - Display At (orderdeliverydate/general/displayat)

 - Time Slots (orderdeliverydate/general/timeslots)

 - Date Format (orderdeliverydate/general/dateformat)

 - Icon Calendar (orderdeliverydate/general/iconcalendar)


## Attributes

 - Sales - delivery_timeslot (delivery_timeslot)

 - Sales - delivery_date (delivery_date)

 - Sales - delivery_comments (delivery_comments)

