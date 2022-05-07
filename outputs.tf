output "public_ip_of_step-web1" {
  value = "${aws_instance.step-web1.public_ip}"
}