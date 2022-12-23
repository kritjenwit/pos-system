const Request = require("express").Request;
const Response = require("express").Response;
const db = require("../databased/db");


const getDataSales = async (req, res) => {
    let pdId = req.body.product_id;

    if (pdId == "") {
        let response = {
            code: 401,
            message: "Invalid Input is empty."
        }
        res.json(response);
        res.end();
        return;
    } else {
        let product = "SELECT * FROM product_info WHERE product_id = ?";
        var dataProduct = await db.query(product, [pdId]);

        if (dataProduct && dataProduct.length > 0) {
            let response = {
                dataProduct: dataProduct[0]
            }
            res.json(response);
            res.end();
            return;
        }
    }
};

const putAccountData = async (req, res) => {
    let userId = req.body.user_id;
    let pdId = req.body.product_id;
    let pdName = req.body.product_name;
    let pdType = req.body.product_type;
    let pdBrand = req.body.product_brand;
    let pdAmount = req.body.amount;
    let pdPrice = req.body.price;

    if (userId == "" || pdId == "" || pdName == "" || pdType == "" || pdBrand == "" || pdPrice == "" || pdAmount == "")
    {
        let response = {
            code: 401,
            message: "Invalid Input is empty."
        }
        res.json(response);
        res.end();
        return;
    } else {

        // INSERT sale_amount (user_id,product_id,product_type,product_brand,product_name,amount,price,DATE) VALUE (1,1,'เสื้อยืด','nike','เสื้อยืดรุ่น555',2,1500,NOW())
        let sql = "INSERT INTO sale_amount(user_id, product_id, product_name, product_type, product_brand, amount, price, date) VALUES(?, ?, ?, ?, ?, ?, ?)";
        let result = await db.query(sql, [userId, pdId, pdType, pdBrand, pdName, pdAmount, pdPrice, new Date()]);
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
    }
}

module.exports = {
  putAccountData,
  getDataSales,
};
