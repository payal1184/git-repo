# 🌐 Static Website Hosting using AWS S3 + CloudFront

## 📖 Project Overview
This project demonstrates how to host a **static website** (HTML, CSS, JS) using **Amazon S3** and **Amazon CloudFront**.  
The goal is to make the website **secure, fast, and globally available** using AWS cloud services.

---

## 🧩 AWS Services Used
- **Amazon S3** → To store and host website files  
- **Amazon CloudFront** → To deliver content faster across the globe  
- **Amazon Route 53 (optional)** → For custom domain (optional setup)

---

## 🎯 Objective
To host a simple HTML/CSS website on **Amazon S3**, enable **public access**, and use **CloudFront CDN** for better performance and security.

---

## ⚙️ Step-by-Step Implementation

### 🪣 Step 1: Create S3 Bucket
1. Go to **AWS Console → S3 → Create bucket**  
2. Enter a unique bucket name → example: `my-static-website-project`  
3. Select your region → (Asia Pacific - Mumbai preferred)  
4. Uncheck **"Block all public access"**  
5. Click **Create bucket**

---

### 📤 Step 2: Upload Website Files
- Upload `index.html`, `style.css`, and any image or JS files to your bucket.

---

### 🌐 Step 3: Enable Static Website Hosting
1. Go to the **Properties** tab  
2. Scroll to **Static website hosting**  
3. Enable it and select → “Host a static website”  
4. Enter:
   - Index document → `index.html`
   - Error document → `error.html` (optional)
5. Save and note your **S3 website endpoint URL**  
   Example:  
