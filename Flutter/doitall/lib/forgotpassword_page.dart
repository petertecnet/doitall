import 'dart:convert';
import 'dart:html';
import 'package:doitall/forgotpassword_page.dart';
import 'package:doitall/home_page.dart';
import 'package:doitall/newregister_page.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

import 'Core/Animation/Fade_Animation.dart';
import 'Core/Colors/Hex_Color.dart';
import 'login_page.dart';

enum FormData {
  Email,
  password,
}

class ForgotpasswordPage extends StatefulWidget {
  const ForgotpasswordPage({Key? key}) : super(key: key);

  @override
  State<ForgotpasswordPage> createState() => _ForgotpasswordPageState();
}

class _ForgotpasswordPageState extends State<ForgotpasswordPage> {
  final _formkey = GlobalKey<FormState>();
  final _emailController = TextEditingController();

  Color enabled = const Color.fromARGB(255, 63, 56, 89);
  Color enabledtxt = Colors.white;
  Color deaible = Colors.grey;
  Color backgroundColor = const Color(0xFF1F1A30);
  bool ispasswordev = true;
  FormData? selected;

  Widget _body() {
    return Form(
      key: _formkey,
      child: Column(
        children: [
          SingleChildScrollView(
            child: SizedBox(
              width: MediaQuery.of(context).size.width,
              height: MediaQuery.of(context).size.height,
              child: Padding(
                padding: const EdgeInsets.all(15.0),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Container(
                      height: 10,
                    ),
                    Card(
                      elevation: 5,
                      color: const Color.fromARGB(255, 171, 211, 250)
                          .withOpacity(0.4),
                      child: Container(
                        width: 450,
                        padding: const EdgeInsets.all(40.0),
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(8),
                        ),
                        child: Column(
                          mainAxisSize: MainAxisSize.min,
                          children: [
                            FadeAnimation(
                              delay: 3,
                              child: Image.network(
                                "https://doitall.com.br/img/logo.png",
                                width: 100,
                                height: 100,
                              ),
                            ),
                            const SizedBox(
                              height: 10,
                            ),
                            FadeAnimation(
                              delay: 2,
                              child: GestureDetector(
                                onTap: (() {
                                  Navigator.pop(context);
                                  Navigator.of(context).push(
                                      MaterialPageRoute(builder: (context) {
                                    return LoginPage();
                                  }));
                                }),
                                child: Text("Fazer login?",
                                    style: TextStyle(
                                      color: Colors.white.withOpacity(0.9),
                                      letterSpacing: 0.5,
                                    )),
                              ),
                            ),
                            const SizedBox(height: 10),
                            FadeAnimation(
                              delay: 3,
                              child: Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                mainAxisSize: MainAxisSize.min,
                                children: [
                                  const Text("Ainda não tem cadastro? ",
                                      style: TextStyle(
                                        color: Colors.grey,
                                        letterSpacing: 0.5,
                                      )),
                                  GestureDetector(
                                    onTap: () {
                                      Navigator.pop(context);
                                      Navigator.of(context).push(
                                          MaterialPageRoute(builder: (context) {
                                        return NewRegisterPage();
                                      }));
                                    },
                                    child: Text("Registrar",
                                        style: TextStyle(
                                            color:
                                                Colors.white.withOpacity(0.9),
                                            fontWeight: FontWeight.bold,
                                            letterSpacing: 0.5,
                                            fontSize: 14)),
                                  ),
                                ],
                              ),
                            ),
                            const SizedBox(
                              height: 20,
                            ),
                            FadeAnimation(
                              delay: 4,
                              child: Container(
                                width: 300,
                                height: 40,
                                decoration: BoxDecoration(
                                    borderRadius: BorderRadius.circular(12.0),
                                    color: selected == FormData.Email
                                        ? enabled
                                        : backgroundColor),
                                padding: const EdgeInsets.all(5.0),
                                child: TextField(
                                  controller: _emailController,
                                  onChanged: (text) {},
                                  keyboardType: TextInputType.emailAddress,
                                  onTap: () {
                                    setState(() {
                                      selected = FormData.Email;
                                    });
                                  },
                                  decoration: InputDecoration(
                                      enabledBorder: InputBorder.none,
                                      border: InputBorder.none,
                                      prefixIcon: Icon(
                                        Icons.email_outlined,
                                        color: selected == FormData.Email
                                            ? enabledtxt
                                            : deaible,
                                        size: 20,
                                      ),
                                      hintText: 'Email',
                                      hintStyle: TextStyle(
                                          color: selected == FormData.Email
                                              ? enabledtxt
                                              : deaible,
                                          fontSize: 12)),
                                  textAlignVertical: TextAlignVertical.center,
                                  style: TextStyle(
                                    color: selected == FormData.Email
                                        ? enabledtxt
                                        : deaible,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 12,
                                  ),
                                ),
                              ),
                            ),
                            const SizedBox(
                              height: 20,
                            ),
                            FadeAnimation(
                              delay: 4.5,
                              child: ElevatedButton(
                                  onPressed: () {
                                    if (_formkey.currentState!.validate()) {
                                      login();
                                    }
                                  },
                                  child: Text(
                                    "Enviar link",
                                    style: TextStyle(
                                      color: Colors.white,
                                      letterSpacing: 0.5,
                                      fontSize: 16.0,
                                      fontWeight: FontWeight.bold,
                                    ),
                                  ),
                                  style: TextButton.styleFrom(
                                      backgroundColor: Color(0XFF00b3eb),
                                      padding: const EdgeInsets.symmetric(
                                          vertical: 14.0, horizontal: 80),
                                      shape: RoundedRectangleBorder(
                                          borderRadius:
                                              BorderRadius.circular(12.0)))),
                            ),
                          ],
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Stack(
      children: [
        SizedBox(
            height: MediaQuery.of(context).size.height,
            width: MediaQuery.of(context).size.width,
            child: Image.network(
              'https://doitall.com.br/img/background.png',
              fit: BoxFit.cover,
            )),
        Container(
          color: Colors.black.withOpacity(0.1),
        ),
        _body(),
      ],
    ));
  }

  login() async {
    if (_emailController.text == null || _emailController.text.isEmpty) {
      return ScaffoldMessenger.of(context).showSnackBar(new SnackBar(
        backgroundColor: Colors.red,
        content: Center(
          child: FadeAnimation(
            delay: 0.5,
            child: Text(
              'Digite o email',
              selectionColor: Colors.red,
            ),
          ),
        ),
        behavior: SnackBarBehavior.floating,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(24),
        ),
        margin: EdgeInsets.only(
            bottom: MediaQuery.of(context).size.height - 100,
            right: 20,
            left: 20),
      ));
    }
    var url = Uri.parse('https://doitall.com.br/api/sendResetLinkEmail');

    var response = await http.post(
      url,
      body: {
        'email': _emailController.text,
      },
    );

    SharedPreferences prefs = await SharedPreferences.getInstance();
    var json = jsonDecode((response.body));

    if (json['status'] == 200) {
      String token = (json['token']);
      await prefs.setString('token', 'token $token');
      ScaffoldMessenger.of(context).showSnackBar(new SnackBar(
        backgroundColor: Color.fromARGB(255, 10, 136, 198),
        content: Center(
          child: FadeAnimation(
            delay: 0.2,
            child: Text(
              'Email enviado para sua caixa de entrada com instruções para recuperação de senha!',
              selectionColor: Color.fromARGB(255, 241, 241, 241),
            ),
          ),
        ),
        behavior: SnackBarBehavior.floating,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(24),
        ),
        margin: EdgeInsets.only(
            bottom: MediaQuery.of(context).size.height - 100,
            right: 20,
            left: 20),
        duration: Duration(seconds: 20),
      ));
    }
    if (json['status'] != 200) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(
          backgroundColor: Colors.redAccent,
          content: Center(child: Text('Não foi possivel enviar o email')),
          behavior: SnackBarBehavior.floating,
        ),
      );
    }
  }
}
