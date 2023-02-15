import 'dart:convert';

import 'package:http/http.dart' as http;

Future main() async {
  final user = await fetch();
  print(user);
}

Future<User> fetch() async {
  var url = 'http://127.0.0.1:8000/api/list';
  var response = await http.get(Uri.parse(url));
  var json = jsonDecode((response.body));

  return json;
}

class User {
  final String user;

  User({required this.user});

  factory User.fromJson(Map json) {
    return User(
      user: json['user'],
    );
  }
}
