const express = require("express");
const salehandlers = require("./handlers/sale");
const flow_account = require("./handlers/flowaccount");
const stock = require("./handlers/stock");
const app = express();
app.use(express.json());
const PORT = 3000;
app.use(express.urlencoded({ extended: false }));
app.post("/api/sale", salehandlers.checksalehandlers);  //ยอดขายรายเดือนของพีช
app.get("/api/user", flow_account.flowaccountHandler); //แสดงค่าใช้จ่าย dear
app.post("/api/createflow", flow_account.insertflowaccountHandler); //บันทึกค่าใช้จ่าย dear
app.post("/api/updateflow", flow_account.updateflowaccountHandler); //อัพเดทค่าใช้จ่าย dear
app.get("/api/stock", stock.stockHandler); //stock dear
//app.get();
app.get('/', (req, res) => {
  res.send('Hello World!')
})
app.listen(PORT, () => {
  console.log("Listen on port " + PORT);
});
