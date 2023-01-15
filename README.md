# KeyAuth-PHP-Example-SellerAPI

**This example is created because newest KeyAuth API doesn't let users that have hwid locked Login,
but this uses SellerAPI To check user details like normal api would do.**

**So with this Example you can have your Application and Website runned on one Application.**

## **Change-log**
https://headwayapp.co/pivlcloud-changelog

## Requirements
1. **Seller Subscription**
2. **Hosting Device**


## Showcase 
[![](https://cdn.discordapp.com/attachments/918502538301567050/934216854451392563/unknown.png)](https://streamable.com/70c7w7)

## Installation
1. Download this Project.
2. Extract it
3. Open index.php File
```PHP
Change these on Lines: 11 - 12

$name = ""; // your application name
$ownerid = ""; // your KeyAuth account's ownerid, located in account settings 
```
4. Open dashboard folder and inside that is index.php.
```PHP
Change this on line: 32

$sellerkey = ""; //CHANGE THIS <---

Can be found on KeyAuth Application Seller Settings
```
5. Save All.
6. Host the files on your choice of host, if you want to test on localhost use [XAMPP](https://www.apachefriends.org/download.html) [Windows]
7. Everything should be done now.

## Page refreshes but nothing happens, after logged in to your app c# or c++
- Make sure your KeyAuth Application HWID Mismatch looks like this, it needs to be this to work.

```HWID Doesn't match. Ask for key reset.```

![image](https://user-images.githubusercontent.com/79049205/150598357-45305311-a900-4e06-a461-3c46cc10e15a.png)


## Credits
[![KeyAuth](https://github.com/mazk5145/mazk9154-Information/blob/main/Images/keyauthwinlogo.png?raw=true)](https://keyauth.win)
[![KeyAuth Discord](https://github.com/mazk5145/mazk9154-Information/blob/main/Images/keyauthdiscordlogo.png?raw=true)](https://keyauth.com/discord)


## Copyright License

KeyAuth is licensed under **Elastic License 2.0**

* You may not provide the software to third parties as a hosted or managed
service, where the service provides users with access to any substantial set of
the features or functionality of the software.

* You may not move, change, disable, or circumvent the license key functionality
in the software, and you may not remove or obscure any functionality in the
software that is protected by the license key.

* You may not alter, remove, or obscure any licensing, copyright, or other notices
of the licensor in the software. Any use of the licensor’s trademarks is subject
to applicable law.

Thank you for your compliance, we work hard on the development of KeyAuth and do not appreciate our copyright being infringed.