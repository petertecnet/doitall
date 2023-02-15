import 'package:flutter/material.dart';
import 'package:doitall/home_page.dart';
import 'package:doitall/forgotpassword_page.dart';
import 'package:doitall/newregister_page.dart';
import 'package:doitall/login_page.dart';
import 'app_controller.dart';
import 'model/user_model.dart';

class AppWidget extends StatelessWidget {
  final User user;

  AppWidget({required this.user});

  @override
  Widget build(BuildContext context) {
    return AnimatedBuilder(
      animation: AppController.instance,
      builder: (context, child) {
        return MaterialApp(
          debugShowCheckedModeBanner: false,
          theme: ThemeData(
            primarySwatch: Colors.blue,
            brightness: AppController.instance.isDarkTheme
                ? Brightness.dark
                : Brightness.light,
          ),
          initialRoute: '/',
          routes: {
            '/': (context) => LoginPage(),
            '/homepage': (context) => HomePage(user: user),
            '/newregisterpage': (context) => NewRegisterPage(),
            '/forgotpasswordpage': (context) => ForgotpasswordPage(),
          },
        );
      },
    );
  }
}
