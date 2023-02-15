class User {
  String name;
  String email;
  String password;

  User({
    required this.name,
    required this.email,
    this.password = '',
  });
}
