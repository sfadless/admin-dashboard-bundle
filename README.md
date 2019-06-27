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