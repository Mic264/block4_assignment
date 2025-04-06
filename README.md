
<h1 align="center">
  UA92: Assessment
</h1>
<h2 align="center">
  BLOCK 4
  </ br>
  Back-end Development
</h2>

### ASSESSMENT SUMMARY
You have recently accepted a new role working as a back-end web developer for a small primary school called St Alphonsus Primary School. The school currently use paper-based records to store information of pupils, parents, teachers, classes etc. The Head Teacher has employed you to create a web-based digital system including a relational database to hold all these records digitally.  
The information they hold is:  
1. Classes  
    - There are 7 classes in total; Reception Year, Year One, Year Two, Year Three, Year Four, Year Five and Year Six  
    - The class name and capacity is held  
    - A class can have many pupils, up-to the class capacity  
    - A class can only have one teacher  

2. Pupils  
    - The pupil information, such as name, address, medical information etc is held  
    - Each pupil can only be enrolled in one class at a time  
    - Each pupil can have up-to two parents/guardians  

3. Parents/guardians  
    - The parent/guardian information is held, such as their name, address, email, telephone etc.  
    - A parent/guardian may be allocated to multiple pupils (siblings)  

4. Teachers  
    - The teacher information is held, such as name, address, phone number, annual salary and background check etc.  
    - A teacher can only teach one class at a time  
  
There are other (optional) information held, such as Teaching Assistants, Salaries, Dinner Money, Library Books etc which the school would like implemented, but not required. Additional functionality can be implemented in the system, such as school registrations, etc.  
  
## How to setup your xammp development environment  
### Configuring Virtual Hosts in Apache  
Go to your XAMPP Control Panel windows and click on "Apache -> Config -> \<Browse> Apache" menu item.  
![alt text](https://iili.io/37shCas.jpg)  
  
Navigate to the "\<Browse> Apache\conf\extra" dir and locate file "httpd-vhosts.conf"  
![alt text](https://iili.io/37shf6X.jpg)  
  
Open httpd-vhost config in notepad or any other text editor (my personal choice is VSCode)  
and modify or add and entry similar to the highlighted one in the image below.  
(We only need to use fields "DocumentRoot" and "ServerName")  
> Please see the documentation at:  
> [http://httpd.apache.org/docs/2.4/vhosts/]  

![alt text](https://iili.io/37shKGt.jpg)  
> Make sure that field "DocumentRoot" uses your local installation path to "public" folder and forward slashes (/).  
Now use XAMPP Control Panel to restart your apache server.  
  

### Configuring Virtual Hosts on Windows  
Navigate to "C:\Windows\System32\drivers\etc" dir and locate file "hosts".  
![alt text](https://iili.io/37shFnI.jpg)  
Open "hosts" file in notepad or any other text editor (my personal choice is VSCode)  
and modify to add and entry similar to the highlighted one in the image below (127.0.0.1 sms.local).  
![alt text](https://iili.io/37shAnS.jpg)  
> Notice the space between "127.0.0.1" and "sms.local"  
  
For operating systems, other than Windows, in order to edit your "hosts" file, follow the instructions in the link below:  
[https://www.howtogeek.com/27350/beginner-geek-how-to-edit-your-hosts-file/]  
  
You should now be able to view the code in a browser, using URL http://sms.local/:
![alt text](https://iili.io/37shRM7.jpg)  
> Make sure that you use HTTP and not HTTPS.