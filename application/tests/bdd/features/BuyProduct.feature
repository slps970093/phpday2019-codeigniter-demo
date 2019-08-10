Feature: 測試下單

  @javascript
  Scenario: 買兩個產品填寫資料後下單完成購物流程
    Given go to product page
    When I click Coffee
    When I click Milk
    When I fill in "name" with "Hello"
    When I fill in "address" with "World"
    When I fill in "phone" with "6666"
    When I press "Buy"
    Then I should see "success"



