<?php
//Created a function that sets the name of the page title and first <h1> tag on the page
function set_page_name($subsec){

    //If the subsection is equal to "terms-of-use"
    if ($subsec === 'terms-of-use')
    
        //Then the name will be the following
        return 'Terms of Use';

    //Else it will be the following
    else
        return 'Privacy Policy';
}

?>
<html>

<head>

    <!--Calls function created above-->
    <title>{{set_page_name($subsection)}}</title>

     <!--Calls the cookie-notice component displaying information to the user (can be found in views\components\cookie-notice.php)-->
    <x-cookie-notice/>
</head>

<body>

    <!--Calls function created above-->
    <h1>Legal: {{set_page_name($subsection)}}</h1>

    <!--If the subsection is equal to 'terms-of-use' then the following will be displayed to the user-->
    @if($subsection === 'terms-of-use')
        <p>Please read these terms of use ("terms of use", "agreement") carefully before using www.cool-tech.com website (“website”, "service") operated by Cool Tech ("us", 'we", "our").</p>

        <h3>Conditions of use</h3>
        <p>By using this website, you certify that you have read and reviewed this Agreement and that you agree to comply with its terms. 
            If you do not want to be bound by the terms of this Agreement, you are advised to leave the website accordingly. 
            Cool Tech only grants use and access of this website, its products, and its services to those who have accepted its terms.
        </p>

        <h3>Privacy policy</h3>
        <p>Before you continue using our website, we advise you to read our <a href="{{url('/legal/privacy-policy')}}">Privacy Policy</a> regarding our user data collection. It will help you better understand our practices.</p>

        <h3>Age restriction</h3>
        <p>You must be at least 18 (eighteen) years of age before you can use this website. By using this website, you warrant that you are at least 18 years of age and you may legally adhere to this Agreement. 
            Cool Tech assumes no responsibility for liabilities related to age misrepresentation.
        </p>

        <h3>Intellectual property</h3>
        <p>You agree that all materials, products, and services provided on this website are the property of Cool Tech, 
            its affiliates, directors, officers, employees, agents, suppliers, or licensors including all copyrights, trade secrets, trademarks, patents, and other intellectual property. 
            You also agree that you will not reproduce or redistribute the Cool Tech's intellectual property in any way, including electronic, digital, or new trademark registrations.
        </p>

        <p>You grant Cool Tech a royalty-free and non-exclusive license to display, use, copy, transmit, and broadcast the content you upload and publish. 
            For issues regarding intellectual property claims, you should contact the company in order to come to an agreement.
        </p>

        <h3>User accounts</h3>
        <p>As a user of this website, you may be asked to register with us and provide private information. 
            You are responsible for ensuring the accuracy of this information, and you are responsible for maintaining the safety and security of your identifying information. 
            You are also responsible for all activities that occur under your account or password.
        </p>

        <p>If you think there are any possible issues regarding the security of your account on the website, inform us immediately so we may address it accordingly.</p>

        <p>We reserve all rights to terminate accounts, edit or remove content and cancel orders in their sole discretion.</p>

        <h3>Applicable law</h3>
        <p>By visiting this website, you agree that the laws of the South African Government, without regard to principles of conflict laws, 
            will govern these terms and conditions, or any dispute of any sort that might come between Cool Tech and you, or its business partners and associates.
        </p>

        <h3>Disputes</h3>
        <p>Any dispute related in any way to your visit to this website shall be arbitrated by state or federal court South Africa and you consent to exclusive jurisdiction and venue of such courts.</p>

        <h3>Indemnification</h3>
        <p>You agree to indemnify Cool Tech and its affiliates and hold Cool Tech harmless against legal claims and demands that may arise from your use or misuse of our services. 
            We reserve the right to select our own legal counsel. 
        </p>

        <h3>Indemnification</h3>
        <p>Cool Tech is not liable for any damages that may occur to you as a result of your misuse of our website.</p>

        <p>Cool Tech reserves the right to edit, modify, and change this Agreement any time. We shall let our users know of these changes through electronic mail. 
            This Agreement is an understanding between Cool Tech and the user, and this supersedes and replaces all prior agreements regarding the use of this website.
        </p>

    <!--Else if the subsection is equal to 'privacy-policy' then the following will be displayed to the user-->
    @elseif($subsection === 'privacy-policy')
        <p>This privacy policy ("policy") will help you understand how Cool Tech ("us", "we", "our") uses and protects the data you provide to us when you visit and use www.cool-tech.com ("website", "service").</p>

        <p>We reserve the right to change this policy at any given time, of which you will be promptly updated. 
            If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page.
        </p>

        <h3>What User Data We Collect</h3>
        <p>When you visit the website, we may collect the following data:</p>
        <ul>
            <li>Your IP address.</li>
            <li>Your contact information and email address.</li>
            <li>Other information such as interests and preferences</li>
            <li>Data profile regarding your online behavior on our website.</li>
        </ul>

        <h3>Why We Collect Your Data</h3>
        <p>We are collecting your data for several reasons:</p>
        <ul>
            <li>To better understand your needs.</li>
            <li>To improve our services and products.</li>
            <li>To send you promotional emails containing the information we think you will find interesting.</li>
            <li>To contact you to fill out surveys and participate in other types of market research.</li>
            <li>To customize our website according to your online behavior and personal preferences.</li>
        </ul>

        <h3>Safeguarding and Securing the Data</h3>
        <p>Cool Tech is committed to securing your data and keeping it confidential. Cool Tech has done all in its power to prevent data theft, 
            unauthorized access, and disclosure by implementing the latest technologies and software, which help us safeguard all the information we collect online.
        </p>

        <h3>Our Cookie Policy</h3>
        <p>Once you agree to allow our website to use cookies, you also agree to use the data it collects regarding your online behavior 
            (analyze web traffic, web pages you spend the most time on, and websites you visit).
        </p>
        <p>The data we collect by using cookies is used to customize our website to your needs. 
            After we use the data for statistical analysis, the data is completely removed from our systems.
        </p>
        <p>Please note that cookies don't allow us to gain control of your computer in any way. 
            They are strictly used to monitor which pages you find useful and which you do not so that we can provide a better experience for you.
        </p>
        <p>If you want to disable cookies, you can do it by accessing the settings of your internet browser. 
            You can visit www.internetcookies.com, which contains comprehensive information on how to do this on a wide variety of browsers and devices.
        </p>

        <h3>Links to Other Websites</h3>
        <p>Our website contains links that lead to other websites. If you click on these links Cool Tech is not held responsible for your data and privacy protection. Visiting those websites is not governed by this privacy policy agreement. 
            Make sure to read the privacy policy documentation of the website you go to from our website.
        </p>

        <h3>Restricting the Collection of your Personal Data</h3>
        <p>At some point, you might wish to restrict the use and collection of your personal data. You can achieve this by doing the following:</p>
        <p>When you are filling the forms on the website, make sure to check if there is a box which you can leave unchecked, if you don't want to disclose your personal information.</p>
        <p>If you have already agreed to share your information with us, feel free to contact us via email and we will be more than happy to change this for you.</p>
        <p>Cool Tech will not lease, sell or distribute your personal information to any third parties, unless we have your permission. 
            We might do so if the law forces us. Your personal information will be used when we need to send you promotional materials if you agree to this privacy policy.
        </p>
    
    @endif
</body>

<footer>
    <!--Calls the copyright-notice component displaying information to the user (can be found in views\components\copyright-notice.php)-->
    <x-copyright-notice/>
</footer>

</html>