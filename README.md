## Installation

1.Install using composer:

```bash
composer require sfadless-cmf/admin-dashboard-bundle dev-master
```

2.Add routing in config/routes.yaml
```yaml
sfadless_cmf.admin_dashboard:
    resource: '@AdminDashboardBundle/Resources/config/routing/sfadless_cmf_admin_dashboard.xml'
```

3.Create database entities:
```bash
php bin/console d:s:u -f
```
4.Add security config in config/packages/security.yaml:
```yaml
security:
    role_hierarchy:
        ROLE_SUPER_ADMIN: [ROLE_ADMIN]

    encoders:
        SfadlessCMF\AdminDashboardBundle\Entity\User: bcrypt

    providers:
        users:
            id: SfadlessCMF\AdminDashboardBundle\Security\UserProvider

    firewalls:
        dev:
            pattern:  ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            pattern:            /(.*)
            form_login:
                provider:       users
                login_path:     sfadless_cmf.admin_dashboard.login
                use_forward:    false
                check_path:     sfadless_cmf.admin_dashboard.login
                failure_path:   null
            logout:
                path:           sfadless_cmf.admin_dashboard.logout
                target:         sfadless_cmf.admin_dashboard.login
            anonymous:          true
            guard:
                authenticators:
                    - SfadlessCMF\AdminDashboardBundle\Security\AdminLoginAuthenticator

    access_control:
        - { path: ^/admin/login$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/logout$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/, role: [ROLE_ADMIN] }
        - { path: ^/.*, role: IS_AUTHENTICATED_ANONYMOUSLY }
```