variable "aws_access_key" {}
variable "aws_secret_key" {}
variable "region" {
    default = "ap-northeast-1"
}

# Map
# 定義した変数の値は、var.images.ap-northeast-1のようにして参照可能
variable "images" {
  default = {
    step-bastion = "ami-034e9fbef9c54ebf7"
    step-web1 = "ami-0f25352aa13d9a3ca"
    us-east-1 = ""
    us-west-2 = ""
    us-west-1 = ""
    eu-west-1 = ""
    eu-central-1 = ""
    ap-southeast-1 = ""
    ap-southeast-2 = ""
    ap-northeast-1 = ""
    sa-east-1 = ""
  }
}