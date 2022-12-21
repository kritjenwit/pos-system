var Request = require('express').request;
var Response = require('express').response;
const db = require("../databased/db");


const loginHandler = async (req, res) => {
    let username = req.body.username;
    let password = req.body.password;

    if (!(username && password)) {
        let response = {
        code: 401,
        message: "Invalid Username and password",
        };
        res.json(response);
        res.end();
        return;
    }

    let sql = `SELECT username, password FROM users_account WHERE username = '${username}' AND password = '${password}'`;
    // console.log(result[0]);
    let result = await db.query(sql);
    // Login successfully
    if (result && result[0].length > 0) {
        let response = {
        code: 200,
        message: "Successfully logged",
        result: result[0],
        };
        res.json(response);
        res.end();
        return;
    } else {
        // Login failed
        let response = {
        code: 401,
        message: "Invalid Username and password is corrections.",
        };
        res.json(response);
        res.end();
        return;
    }
};

/*****
 * 
 * 
 * Register
 * 
 */
const registerHandler = async (req, res) => {
    /*** @type {string} */
    let firstname = req.body.firstname;
    /*** @type {string} */
    let lastname = req.body.lastname;
    /*** @type {string} */
    let username = req.body.username;
    /*** @type {string} */
    let password = req.body.password;
    /*** @type {string} */
    let comfirm_password = req.body.comfirm_password;

    let address = req.body.address;
    
    if (!(username &&
        password &&
        comfirm_password &&
        firstname &&
        lastname &&
        address)) {
      let response = {
        code: 402,
        message: "Invalid is empty",
      };
      res.json(response);
      res.end();
      return;
    }
  
    if (password !== comfirm_password) {
      let response = {
        code: 403,
        message: "Password and Comfirm password do not match",
      };
      res.json(response);
      res.end();
      return;
    } else {
      let sql = `SELECT * FROM users_account WHERE username = ? limit 1`;
      let result = await db.query(sql, [username]);
        console.log(result);
      if (result && result[0].length > 0) {
        let response = {
          code: 400,
          message: "Username is corrections",
        };
        res.json(response);
        res.end();
        return;
      } else {
        let sql = `INSERT INTO users_account (username, password, date) VALUES (?, ?, ?)`;
        let result = await db.query(sql, [username, password, new Date()]);
  
        if (result && result[0].affectedRows > 0) {
          let userId = result[0].insertId;
          sql = `INSERT INTO users_info (user_id, firstname, lastname, address, date) VALUES (?, ?, ?, ?, ?)`;
          result = await db.query(sql, [userId, firstname, lastname, address, new Date()]);
  
          if (result && result[0].affectedRows > 0) {
            let response = {
              code: 200,
              message: "Successfully logged",
              result: result[0],
            };
            res.json(response);
            res.end();
            return;
          } else {
            // Login failed
            let response = {
              code: 405,
              message: "Invalid Username and password is corrections.",
            };
            res.json(response);
            res.end();
            return;
          }
        } else {
          let response = {
            code: 407,
            message: "Not found parameter.",
          };
          res.json(response);
          res.end();
          return;
        }
      }
    }
  };

module.exports = {
    loginHandler,
    registerHandler,
};