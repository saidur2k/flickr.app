<?php
    use Faker\Provider\Uuid;

    class LoginCest
    {
        public function _before(AcceptanceTester $I)
        {
        }

        public function _after(AcceptanceTester $I)
        {
        }
        // tests
        public function registerNewUser(AcceptanceTester $I)
        {
            // This is my original test. I realize its not in executeInSelenium()
            // but I'm just showing you what works in non-SPA laravel apps (which doesn't work for me)
            $uuid = Uuid::uuid();
            $I->amOnPage('/');
            $I->click('Register');
            $I->fillField(['name' => 'name'], $uuid);
            $I->fillField(['name' => 'email'], $uuid.'@user.com');
            $I->fillField(['name' => 'password'], 'testuserpass');
            $I->fillField(['name' => 'password_confirmation'], 'testuserpass');
            $I->click('Register', '#RegistrationForm');
            $I->see('Dashboard');
            $I->click('Welcome,', '#LoggedInUserName');
            $I->click('Logout', '#LogoutButton');
        }

        public function registerExistingUser(AcceptanceTester $I)
        {
            $I->amOnPage('/');
            $I->click('Register');
            $I->fillField(['name' => 'name'], 'testuser');
            $I->fillField(['name' => 'email'], 'test@user.com');
            $I->fillField(['name' => 'password'], 'testuserpass');
            $I->fillField(['name' => 'password_confirmation'], 'testuserpass');
            $I->click('Register', '#RegistrationForm');
            $I->see('The email has already been taken');
        }

        public function loginWithJohnSmithAndSearchForCatandSeeIfFirstPageHas5Cats(AcceptanceTester $I)
        {
            $I->amOnPage('/');
            $I->click('Login');
            $I->fillField(['name' => 'email'], 'john@smith.com');
            $I->fillField(['name' => 'password'], 'secret');
            $I->click('Login', '#LoginButtonArea');
            $I->see('Dashboard');
            $I->click('Search Flickr');
            $I->fillField(['name' => 'search_string'], 'cat');
            $I->click('Search', '#SearchForm');
            $I->seeNumberOfElements('img', 5);
        }

        public function loginWithJohnSmithAndSeeIfLastSearchIsCatAndLogout(AcceptanceTester $I)
        {
            $I->amOnPage('/');
            $I->click('Login');
            $I->fillField(['name' => 'email'], 'john@smith.com');
            $I->fillField(['name' => 'password'], 'secret');
            $I->click('Login', '#LoginButtonArea');
            $I->see('Dashboard');
            $I->click('My Search History');
            $I->see('cat', '//*[@id="app"]/div/ul[1]/li[1]');
            $I->click('Welcome,', '#LoggedInUserName');
            $I->click('Logout', '#LogoutButton');
        }


    }