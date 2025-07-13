# 🗂️ File Upload Vulnerability Labs

## 🎯 Objectives

This lab series focuses on exploring **File Upload vulnerabilities**, a common yet critical issue in modern web applications. The goals include:

- Understanding insecure file upload scenarios (e.g., unrestricted, MIME bypass, double extensions)
- Demonstrating how attackers exploit upload features to achieve Remote Code Execution (RCE), webshell access, or denial of service
- Experimenting with both server-side and client-side validation bypass techniques
- Learning how to properly secure file upload mechanisms

---

## 📁 Lab Structure

Each lab typically includes:

- Vulnerable web application or code snippet simulating a file upload scenario  
- Setup guide (via Docker or local instructions)  
- Step-by-step writeups and Proof of Concept (PoC)  
- Defensive practices or mitigation techniques, such as:

  - File type and MIME validation  
  - Content inspection  
  - Extension whitelisting  

---

## 🧪 Covered Scenarios

- ❌ No validation at all  
- 🪤 Content-Type and extension spoofing  
- 📄 .htaccess / PHP webshell upload  
- 📁 Directory traversal via filename manipulation  
- 🧬 MIME-based RCE in image uploads  

---

## 📚 References & Inspirations

Inspired by real-world vulnerabilities, bug bounty writeups, and training platforms:

- [PortSwigger Web Security Academy](https://portswigger.net/web-security/file-upload)  
- [OWASP File Upload Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/File_Upload_Cheat_Sheet.html)  
---

## 🚧 Disclaimer

These labs are for **educational and ethical** purposes only. Do not use the techniques demonstrated here on systems without proper authorization.

---

