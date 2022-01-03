// import Model Student
const bodyParser = require("body-parser");
const { append } = require("express/lib/response");
const Student = require("../models/Student");

class StudentController {
  async index(req, res) {
    const students = await Student.all();
    const data = {
      message: "Menampilkkan semua students",
      data: students,
    };
    res.json(data);
  }

  async store(req, res) {
    const student = await  Student.create(req.query);
    const data = {
      message: "Menambahkan data student",
      data: student,
    };
    res.json(data);
  }

  async update(req, res) {
    const {id} = req.params;
    const student = await  Student.find(id);
    if (student) {
      const student = await Student.update(id, req.query);
      const data = {
        message : "Mengedit data student",
        data: student,
        };
        res.status(200).json(data);
    } else {
      const data ={
        message : "Student not found"
      };
        res.status(404).json(data);
    }
}


  async destroy(req, res) {
    const { id } = req.params;
    const data = {
      message: `Menghapus student id ${id}`,
      data: [],
    };

    res.json(data);
  }
  async destroy(req, res){
    const {id} = req.params;
    const student = await Student.find(id);
    if (student) {
      await Student.delete(id);
      const data = {
        message : "Menghapus data student",
      };
      res.status(200).json(data);
    } else{
      const data = {
        message : "Student not found",
      };
      res.status(404).json(data);
    }
  
  }
}

const object = new StudentController();
module.exports = object;
