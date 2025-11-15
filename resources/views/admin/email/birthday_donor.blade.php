<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Happy Birthday 🎉</title>
</head>
<body style="margin:0; padding:0; background:#f4f4f4; font-family: Arial, sans-serif;">

  <div style="max-width:600px; margin:auto; background:#ffffff; border-radius:8px; border:1px solid #e0e0e0; overflow:hidden;">
    
    <!-- Header -->
    <div style="background:#ff6600; padding:20px; text-align:center; color:#ffffff;">
      <h1 style="margin:0; font-size:24px;">🎉 Happy Birthday, {{ $donor->name }}! 🎉</h1>
    </div>

    <!-- Body -->
    <div style="padding:25px; text-align:center; color:#333;">
      <p style="font-size:16px; line-height:1.6; margin:0 0 15px;">
        On behalf of all of us at <strong>Quest for Peace Wiselife Academy</strong>, 
        we wish you a joyful and fulfilling year ahead.  
        May your birthday be filled with happiness, good health, and precious moments.
      </p>

      <p style="font-size:16px; line-height:1.6; margin:15px 0;">
        As you celebrate your special day, we invite you to consider making a meaningful contribution.  
        Your support helps us transform lives, spread hope, and create a lasting impact in our community.
      </p>

      <!-- Buttons -->
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:20px;">
        <tr>
          <td align="center" style="padding:8px;">
            <a href="{{ url('donate?donate_amount=5') }}" 
               style="display:inline-block; background:#28a745; color:#fff; 
                      padding:12px 24px; text-decoration:none; 
                      font-size:16px; font-weight:bold; border-radius:6px;">
              🎁 Donate $5
            </a>
          </td>
        </tr>
        <tr>
          <td align="center" style="padding:8px;">
            <a href="{{ url('donate?donate_amount=10') }}" 
               style="display:inline-block; background:#007bff; color:#fff; 
                      padding:12px 24px; text-decoration:none; 
                      font-size:16px; font-weight:bold; border-radius:6px;">
              🎁 Donate $10
            </a>
          </td>
        </tr>
        <tr>
          <td align="center" style="padding:8px;">
            <a href="{{ url('donate?donate_amount=15') }}" 
               style="display:inline-block; background:#ff5722; color:#fff; 
                      padding:12px 24px; text-decoration:none; 
                      font-size:16px; font-weight:bold; border-radius:6px;">
              🎁 Donate $15
            </a>
          </td>
        </tr>
      </table>

      <!-- Closing -->
      <p style="font-size:14px; line-height:1.6; color:#555; margin-top:25px;">
        Thank you for being such an important part of our community.  
        Your kindness and generosity make the world a better place. 💖  
        Wishing you a year filled with peace, success, and prosperity. 🌟
      </p>
    </div>

    <!-- Footer -->
    <div style="background:#f4f4f4; padding:15px; text-align:center; font-size:12px; color:#777;">
      © {{ date('Y') }} Quest for Peace Wiselife Academy. All rights reserved.
    </div>

  </div>

</body>
</html>
