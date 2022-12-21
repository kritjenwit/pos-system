const express = require('express');
const cors = require('cors');
const salehandlers = require("./handlers/sale");
const saleAccount = require("./handlers/dataSaleAccount");
const systemLogReg = require("./handlers/login&register");
app = express();
const corsOptions = {
  origin: "http://localhost:3000"
};
app.use(cors(corsOptions));

app.use(express.json());
app.use(express.urlencoded({ extended:false }))

app.post("/api/sale",salehandlers.checksalehandlers);  //ยอดขายรายเดือนของพีช

app.post('/api/putAccount', saleAccount.putAccountData); //push data sale of "Oat"

app.post('/api/loginUser', systemLogReg.loginHandler);

app.post('/api/registerUser', systemLogReg.registerHandler);

app.get('/', (req, res) => {
  res.send('Hello World!')
})

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log("Listen on port " + PORT);
});
