<?php
 require __dir__.'/vendor/autoload.php';
 use Facebook\WebDriver\Remote\DesiredCapabilities;
 use Facebook\WebDriver\Remote\RemoteWebDriver;
 use Facebook\WebDriver\WebDriverBy;
 use Facebook\WebDriver\WebDriverWait;
 use Facebook\WebDriver\WebDriverExpectedCondition;

 $caps = array(
    "app"=>"lt://", // Enter app_url here
    "deviceName"=>"iPhone 11",
    "platformVersion"=>"14",
    "platformName"=>"ios",
    "isRealMobile"=>true,
    "video"=>true,
    "visual"=>true,
    "name"=>"Php - iOS test",
    "build" => "Php Vanilla - iOS",

    // ADD THE APP URL OF OTHER APPS THAT YOU'D LIKE TO INSTALL ON THE SAME DEVICE

    "otherApps" => ["lt:// ", "lt:// "]  #ENTER THE OTHER APP URLs HERE IN AN ARRAY FORMAT

 );

 $username= getenv("LT_USERNAME") ? getenv("LT_USERNAME") : "username"; //Enter username here
 $accesskey = getenv("LT_ACCESS_KEY") ? getenv("LT_ACCESS_KEY") : "accesskey"; //Enter accesskey here

 $driver = RemoteWebDriver::create("https://$username:$accesskey@mobile-hub.lambdatest.com/wd/hub",$caps);

try{
    $wait = new WebDriverWait($driver, 30);
    $wait->until(WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('color')));
    $color_element = $driver->findElement(WebDriverBy::id('color'));
    $color_element->click();

    $text_element = $driver->findElement(WebDriverBy::id('Text'));
    $text_element->click();

    $toast_element = $driver->findElement(WebDriverBy::id('toast'));
    $toast_element->click();

    $notification_element = $driver->findElement(WebDriverBy::id('notification'));
    $notification_element->click();
    sleep(2);

    $driver->quit();
 }  finally {
     $driver->quit();
 }

?>
