# aws-webapp-terraform

## Description

Builds a high available php web application with a Relation DB in AWS using Terraform Modules.

![infrastructure schema](./imgs/diagram.jpg)

## How it works 

To use this project, you must first indicate the root password of our database. In my case, I chose to define it in a file called `vars.tf` Example :

```
  default = "YOUR PASSWORD"
 ```

Second, you must then create your ssh key pair in the `keys` folder. In my case, I use the `ssh-keygen` command as follows :

```shell
ssh-keygen -t rsa

Generating public/private rsa key pair.
Enter file in which to save the key (/home/qaizar/.ssh/id_rsa): ./keys/terraform
Enter passphrase (empty for no passphrase): 
Enter same passphrase again: 
```

Then add the path of your public key in your root module in the `path_to_public_key` parameter of the `my_alb_asg module`. In my case it will be :

```hcl
module "my_alb_asg" {
    ...
    ...
    path_to_public_key   = "/c:/qaizar/Projects/Terraform/aws-ha-web-app/keys/aws_tf.pub"
    ...
    ...
}
```

You can then launch your configuration with the following command

```shell
terraform init 

terraform plan

terraform apply
```

Result :

```
...
...

Outputs:

alb_dns_name = [DNS OF YOUR ELB] 
```
