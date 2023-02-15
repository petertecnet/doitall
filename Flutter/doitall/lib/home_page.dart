import 'package:flutter/material.dart';
import 'package:doitall/app_controller.dart';

import 'model/user_model.dart';

class HomePage extends StatefulWidget {
  static var routeName;
  final User user;

  HomePage({required this.user});

  User get getUser => user;
  @override
  State<HomePage> createState() {
    return HomePageState();
  }
}

class HomePageState extends State<HomePage> {
  int counter = 0;
  bool isDarkTheme = false;

  static const routeName = '/home';

  @override
  Widget build(BuildContext context) {
    final args =
        ModalRoute.of(context)!.settings.arguments as Map<String, dynamic>;
    final String email = args['email'];
    return Scaffold(
      drawer: Drawer(
        child: Column(
          children: [
            UserAccountsDrawerHeader(
              currentAccountPicture: ClipRRect(
                borderRadius: BorderRadius.circular(80),
              ),
              accountName: Text('${widget.user.name}'),
              accountEmail: Text('$email'),
            ),
            ListTile(
              leading: Icon(Icons.home),
              title: Text('Inicio'),
              subtitle: Text('tela de inicio'),
              onTap: () {
                print('home');
              },
            ),
            ListTile(
              leading: Icon(Icons.logout),
              title: Text('Logout'),
              subtitle: Text('Finalizar sessão'),
              onTap: () {
                Navigator.of(context).pushReplacementNamed('/');
              },
            )
          ],
        ),
      ),
      appBar: AppBar(
        title: Text('Home Page'),
        actions: [CustomSwitch()],
      ),
      body: Container(
        width: double.infinity,
        height: double.infinity,
        child: Column(mainAxisAlignment: MainAxisAlignment.center, children: [
          Text('Contatdor: $counter'),
          CustomSwitch(),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                width: 500,
                height: 1,
                color: AppController.instance.isDarkTheme
                    ? Colors.white
                    : Colors.black,
              ),
            ],
          )
        ]),
      ),
      floatingActionButton: FloatingActionButton(
        child: Icon(Icons.add),
        onPressed: () {
          setState(() {
            counter++;
          });
        },
      ),
    );
  }
}

class CustomSwitch extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Switch(
      value: AppController.instance.isDarkTheme,
      onChanged: (value) {
        {
          AppController.instance.changeTheme();
        }
      },
    );
  }
}
