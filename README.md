# eCommerce Web Application

This web application covers the basic CRUD functionality of an eCommerce website. A user can sign up, view items for sale, add items to cart and complete the item purchase. 
In addition to this, an administrator can add items for sale, edit items and delete items. 
They system is designed using a Model View Controller (MVC) architecture.

## Description
The application will allow a user to register an account and create their profile. A welcome email is then sent to the new user welcoming them to the application. 
The database also contains a column called ‘is_admin’. By changing is_admin to 1, the user becomes an administrator, unlocking the administrator features. 
## Build
The application was developed using Laravel 9 and Bootstrap 5.2
Docker Desktop used to run the application
Mailtrap used to simulate the user’s mailbox
TablePlus used to display the MySQL database
Stripe payment system used to simulate the payment process

## Features
* Authentication - Registration and Login
* Welcome user email
* Validation
* Error messages
* Image Upload
* Middleware
* Stripe payments

### Standard User Features
Once registered/logged in, a standard user can avail of the following features:
•	View the products listed on the site. This includes viewing a selection of 4 recently added items and 4 trending items.
•	A user can view an index of items by category, e.g., Consoles or Mobiles. 
•	View the profile of an individual item.
•	Add items to cart
•	Remove items from cart
•	Order an item
•	Enter their card details to pay for the item
•	View their order history
### Administrator Features
In addition to standard user features, an administrator is provided with the following features:
•	List an item for sale
•	View all orders
•	Edit an item, e.g., Change the price of an item
•	Delete an item 
•	Update an order status, e.g., Change status from Pending to Dispatched
## Stripe payment
To use the Stripe payment system, a user is required to enter the following card details
Name: Test
Card Number: 4242 4242 4242 4242
CVC: 987
Expiry Date M/Y: 12/2034
Further information on Stripe Payments can be found at: https://stripe.com/docs/testing


## Licence
Copyright 2023 Kevin O'Kane

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
