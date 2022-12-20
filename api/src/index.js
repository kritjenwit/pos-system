const express = require('express');
//const handlers = require("./handlers/index");
const userHandlers = require("../src/handlers/user");
//const { userHandlers } = require('./handlers/user');

//indexHandlers()
//indexHandlers.indexHandlers

//import express from 'express'
const app = express();
const port = 3000;

//midle ware 
// รับค่า Json
app.use(express.json());

// รับค่า Form data
app.use(express.urlencoded({extended: false}));

//app.get('/', handlers.indexHandlers);
//app.get("/api/get_posts", userHandlers.get_postshandler);
app.get("/api/flowaccount", userHandlers.flowaccountHandler);


app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
});