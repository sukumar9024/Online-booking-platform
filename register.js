document.getElementById("registerBtn").addEventListener("click", function() {
    document.getElementById("popup").style.display = "block";
  });
  
  document.getElementById("close").addEventListener("click", function() {
    document.getElementById("popup").style.display = "none";
  });
  
  document.getElementById("verifyBtn").addEventListener("click", function() {
    const enteredOTP = document.getElementById("otpInput").value;
    const generatedOTP = Math.floor(1000 + Math.random() * 9000); // Generate OTP
    if (enteredOTP == generatedOTP) {
      alert("OTP Verified. Redirecting to login page...");
      // Redirect to login page
      window.location.href = "login.html";
    } else {
      alert("Incorrect OTP. Please try again.");
    }
  });
  