variable "aws_access_key" {}
variable "aws_secret_key" {}
variable "region" {
    default = "ap-northeast-1"
}

# Map
# 定義した変数の値は、var.images.ap-northeast-1のようにして参照可能
variable "images" {
  default = {
    step-bastion = "ami-044061fc44fd32727"
    step-web1 = "ami-023951d8c98983bf2"
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

variable "rds_snapshots" {
  default = {
    rds-step = "arn:aws:rds:ap-northeast-1:906426815168:snapshot:rds-step-20220502"
  }
}