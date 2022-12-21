const express = require("express");
const salehandlers = require("./handlers/sale");
const app = express();
app.use(express.json());
const PORT = 3000;
app.use(express.urlencoded({extended:false}))

app.post("/api/sale",salehandlers.checksalehandlers);  //ยอดขายรายเดือนของพีช

app.get('/', (req, res) => {
  res.send('Hello World!')
})
app.listen(PORT, () => {
  console.log("Listen on port " + PORT);
});
