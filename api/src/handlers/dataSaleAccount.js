const Request = require("express").Request;
const Response = require("express").Response;
const db = require("../databased/db");

const putAccountData = async (req, res) => {
    let pdId = req.body.product_id;
    let pdName = req.body.product_name;
    let pdType = req.body.product_type;
    let pdBrand = req.body.product_brand;
    let pdAmount = req.body.product_amount;
    let pdPrice = req.body.product_price;

    if (pdId == "" || pdName == "" || pdType == "" || pdBrand == "" || pdPrice == "" || pdAmount == "")
    {
        let response = {
            code: 401,
            message: "Invalid Input is empty."
        }
        res.json(response);
        res.end();
        return;
    } else {


        let sql = "INSERT INTO shop_db(product_id, product_name, product_type, product_brand, product_amount, product_price, date) VALUES(?, ?, ?, ?, ?, ?, ?)";
        let result = await db.query(sql, [pdId, pdType, pdBrand, pdName, pdAmount, pdPrice, new Date()]);
        try {
            if (result && result[0].affectedRows > 0)
            {
                let response = {
                    code: 200,
                    message: "Success!",
                    result: result[0],
                }
                res.json(response);
                res.end();
                return;
            }
            else 
            {
                let response = {
                    code: 402,
                    message: "Failed!",
                }
                res.json(response);
                res.end();
                return;
            }
            return true;
        } catch (err) {
            console.log(err.message);
            return false;
        }
    }
}

module.exports = {
  putAccountData,
};
