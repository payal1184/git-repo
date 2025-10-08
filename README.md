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

**Purpose:** Stores and retrieves data for the Application Layer.

**Setup Steps:**
1. Create an **RDS instance** in the **Private Subnet**.
2. Configure **Security Group**: Allow **MySQL(3306) traffic from Application Layer only**.
3. Create **databases, tables, and users**.
4. Test **connectivity from Application Layer**.

**Screenshot:**
![DB Layer Screenshot](image/Screenshot%20(100).png)
![DB Layer Screenshot](image/Screenshot%20(102).png)

---



---

## Technologies Used

- **AWS:** EC2, VPC, Subnets, Security Groups, RDS  
- **Web:** Nginx, HTML, PHP  
- **Database:** MySQL 

---

## Outcome

- Secure and scalable **3-layer architecture**.  
- Layer-wise isolation of **Web, Application, and Database tiers**.  
- Easy to deploy for **learning and testing**.  

