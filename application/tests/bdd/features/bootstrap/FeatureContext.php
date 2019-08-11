<?php


use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\MinkContext;


class FeatureContext extends MinkContext
{


    /**
     * @When /^wait for the page to be loaded$/
     */
    public function waitForThePageToBeLoaded()
    {
        $this->getSession()->wait(10000, "document.readyState === 'complete'");
    }

    /**
     * @param $name
     * @param $value
     * @Given /^I click checkbox on "([^"]*)" with value "([^"]*)"$/
     */
    public function iClickCheckBox($name, $value)
    {
        $page = $this->getSession()->getPage();


        $element = $page->find('css', "input[name='" . $name . "'][value='" . $value . "']");

        if (!$element instanceof NodeElement) {
            throw new InvalidArgumentException(sprintf('Cannot find name of radio: "%s" in value "%s"', $name, $value));
        }

        $element->click();

    }
}