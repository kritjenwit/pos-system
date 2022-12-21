const Request = require("express").Request;
const Response = require("express").Response;
const db = require("../databased/db");

/**
 * 
 * @param {Request} req 
 * @param {Response} res 
 */
const putAccountData = async (req, res) => {
  let pdName = req.body.pd_name;
  let pdType = req.body.pd_type;
  let pdBrand = req.body.pd_brand;
  let pdPrice = req.body.pd_price;

  if (pdName == "" || pdType == "" || pdBrand == "" || pdPrice == "") {
    let response = {
      code: 401,
      message: "Invalid Input is empty.",
    };
    res.json(response);
    res.end();
    return;
  } else {
    let sql =
      "INSERT INTO collect_sales(pd_name, pd_type, pd_brand, pd_price, pd_time) VALUES(?, ?, ?, ?, ?)";
    let result = db.query(sql, [pdName, pdType, pdBrand, pdPrice, new Date()]);
    console.log(result);
    try {
      if (result[0] && result.affectedRows > 0) {
        let response = {
          code: 200,
          message: "Success!",
          result: result[0],
        };
        res.json(response);
        res.end();
        return;
      } else {
        let response = {
          code: 402,
          message: "Failed!",
        };
        res.json(response);
        res.end();
        return;
      }
    } catch (err) {
      console.log(err.message);
      return false;
    }
  }
};

module.exports = {
  putAccountData,
};
