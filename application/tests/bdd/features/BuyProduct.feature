Feature: 測試下單

  @javascript
  Scenario: 買兩個產品填寫資料後下單完成購物流程
    Given I am on "/buy"
    When wait for the page to be loaded
    When I click checkbox on "items[]" with value "1"
    When I click checkbox on "items[]" with value "2"
    When I fill in "name" with "Hello"
    When I fill in "address" with "World"
    When I fill in "phone" with "6666"
    When I press "下單"
    Then I should see "success"



