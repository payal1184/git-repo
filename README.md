# 🌐 3-Tier Architecture on AWS

This repository showcases the deployment of a **Three-Tier Architecture** on **Amazon Web Services (AWS)** to achieve **scalability**, **security**, and **high availability**.  
The implementation demonstrates how cloud resources can be organized into three independent tiers — **Presentation**, **Application**, and **Database** — ensuring better **performance**, **modularity**, and **fault tolerance** across the system.

![Architecture](image/3-tier%20infrastructure-complete_0.png)
---

### 1️⃣ Presentation Layer (Frontend)

1. Launch an EC2 instance in the Public Subnet.  
2. Install Apache/Nginx web server.  
3. Deploy HTML/PHP web pages.  


![Architecture](image/Screenshot%20(98).png)
---

- **VPC & Subnet:**  
  Shows the VPC and public subnet where the web servers are deployed.  
  The VPC provides network isolation, while the Subnet organizes resources within the VPC for better traffic management.
. 

![Architecture](image/Screenshot%20(104).png)
![Architecture](image/Screenshot%20(105).png)





- **Internet Gateway:**  
  The subnets allow incoming traffic from the Internet via the Internet Gateway.  
  Displays the Internet Gateway attached to the VPC, enabling public access to the web tier.


![Architecture](image/Screenshot%20(108).png)



- **Route Table:**  
  Illustrates the route table associated with the public subnet, directing traffic to the Internet Gateway.


![Architecture](image/Screenshot%20(107).png)


---

### 2️⃣ Application Layer (Backend /Business Logic Tier)

**Security Group :**  
  Configure the security group to allow HTTP traffic from the Web Layer only. 
 
  ![Application SG HTTP Rule](image/Screenshot%20(126).png)


- **NAT Gateway:**  
  Configure the NAT Gateway in the public subnet to allow private instances in the Application Layer to access the Internet for updates or patches.  
  
![Application SG HTTP Rule](image/Screenshot%20(110).png)

---

### 3️⃣ Database Layer (Data Tier)

- **RDS Instance:**  

  Uses Amazon RDS (MySQL/PostgreSQL) or Amazon Aurora.
  Shows the database instance deployed in the private subnet of the Database Layer.  
  The instance uses [MySQL/PostgreSQL/etc.] engine, with storage and security configured for high availability.  
  *(Screenshot of the RDS instance from AWS Console)*  
  ![RDS Instance Screenshot](image/Screenshot%20(100).png)

- **DB Subnet Group:**  
  Shows the subnet group where the database instances are deployed.  
  The DB Subnet Group contains multiple private subnets across different Availability Zones (AZs) to ensure high availability.  
  It isolates the database instances from the public internet, allowing access only from the Application Layer instances via their security groups.  


![DB Layer Screenshot](image/Screenshot%20(102).png)

---

---
## ⚡ Deployment Steps

1. Launch Web Layer EC2 instance in the Public Subnet with proper Security Group.  
2. Install Apache or Nginx web server on the EC2 instance.  
3. Deploy HTML/PHP web pages to the web server.  
4. Launch Application Layer EC2 instances in the Private Subnet.  
5. Configure Security Group to allow HTTP traffic from Web Layer only.  
6. Configure NAT Gateway for Application Layer instances to access the Internet.  
7. Launch Database Layer RDS instance in the Private Subnet with DB Subnet Group.  
8. Configure Database Security Group to allow access only from Application Layer.  
9. Verify Web → Application → Database connectivity and functionality.


## Technologies Used

- **AWS:** EC2, VPC, Subnets, Security Groups, RDS,ELB,Auto scalling group.
- **Web:** Nginx, HTML, PHP  
- **Database:** MySQL 

---

## Outcome

- Secure and scalable **3-layer architecture**.  
- Layer-wise isolation of **Web, Application, and Database tiers**.  
- Easy to deploy for **learning and testing**.  

