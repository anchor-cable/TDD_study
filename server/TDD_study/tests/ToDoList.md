# テスト駆動開発 1章写経 ToDoリスト

## MoneyTest
- $5 + 10CHF = $10(レートが2:1の場合)
- $5 + $5 = $10
- $5 + $5がMoneyを返す
- OK $Bank->$reduce($Money)
- Moneyを変換して換算を行う
- Reduce(Bank,String)


- Moneyの丸め処理どうする？
- hashCode()
- nullとの等価性比較
- 他のオブジェクトとの等価性比較

- OK 5CHF * 2 = 10 CHF
- OK DollarとFrancの重複
- OK equalsの一般化
- OK timesの一般化
- OK DollarとFrancを比較する
- OK 通貨の概念
- OK testFrancMultiplicationを削除する？
- OK $5 * 2 = $10
- OK amountをprivateにする
- OK Dollarの副作用どうする？
- OK equals()
