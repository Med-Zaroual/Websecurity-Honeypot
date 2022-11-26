

Welcome to our Honeypot Project for the course Websecurity & Honeypot, made by:
- Mohammed ZAROUAL 
- UBEKU Jeffrey
- ASSAYE Ebenezer Alemayehu

The project consists on setting up & securing Honeypot server after making  a Web application and securing the Webserver.

In our web environment your can login to you account safely after registring, upload your avatar and editing you profile afterwards.

<------------- TOP SECRET -----------> 

if you get here then you must have privileges to be an ADMIN, with admin you can:
-Overview of users currently logged in

-Overview of all users

-Enable/Disable users

Admin Username: rozarot

Admin Password: rozarot123.     

/* keep it secret ;) */  
<-- --------------------------- -->

Ansible:
all ansible installation and cofiguration files are stored in the Ansible_scripts Folder.


Honeypot software:
This modules lays the honeytrap and lures the Attacker to gather information about the Attacker. ModSecurity is used for laying the honeytraps.


 We lay honeytraps using the Core Rule Set (CRS) rules of ModSecurity. We collect the attack information using the Audit logs of ModSecurity. Once the logs are generated, they are sent to Collection software (ELK Stack) for further processing. Shipping the logs is done with the help of Filebeat.



ElasticStack: (Collection software:)
This module processes the logs that are incoming to the system. It filters out the attack information and send them to elasticsearch to be vizualised by Kibana.
