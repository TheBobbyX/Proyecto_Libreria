using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;

namespace LibreriaABC_Selenium_Test
{
    public class LibreriaABCSeleniumTest
    {
        private string webURL = "https://libreriaabc.azurewebsites.net", textAlert;
        private WebDriver webDriver;
        private ChromeOptions options;
        private WebDriverWait wait;
        private IAlert simpleAlert;

        [SetUp]
        public void Setup()
        {
            options = new ChromeOptions();
            options.AddExcludedArgument("enable-automation");
            options.AddUserProfilePreference("credentials_enable_service", false);
            options.AddUserProfilePreference("profile.password_manager_enabled", false);
            options.AddArgument("headless");
            webDriver = new ChromeDriver(options);
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "Daniela", "Gonzalez")]
        public void T001_ListarAutores(string user, string pass, string nameA, string lastnameA)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]/ul/li[1]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompleta\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile("ListarAutores.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba 
            Assert.IsTrue(webDriver.PageSource.Contains(nameA) && webDriver.PageSource.Contains(lastnameA));

        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "Panameña")]
        public void T002_ListarAutoresNacionalidad(string user, string pass, string nacionalidad)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]/ul/li[2]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tautoresc1\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"ListarAutoresNacionalidad - {nacionalidad}.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba
            Assert.IsTrue(webDriver.PageSource.Contains(nacionalidad));
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "1247", "101 Grandes Mujeres De La Historia")]
        public void T003_ListarLibros(string user, string pass, string ISBN, string nameL)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]/ul/li[1]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile("ListarLibros.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba 
            Assert.IsTrue(webDriver.PageSource.Contains(nameL) && webDriver.PageSource.Contains(ISBN));
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "2017", "Español 11")]
        //[DataRow("8-893-2450", "Roberto", "2019", "Astronomía Para Todos")]
        public void T004_ListarLibrosAño(string user, string pass, string year, string nameL)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]/ul/li[3]/a")).Click();

            //introducir año y click para buscar 
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(year);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[3]")).Submit();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tautoresc1\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"ListarLibrosAño - {year} - {nameL}.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba
            Assert.IsTrue(webDriver.PageSource.Contains(nameL));
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "1003", "Español 11", "1249")]
        //[DataRow("8-893-2450", "Roberto", "1005", "Física 12", "1252")]
        public void T005_ListarLibrosAutor(string user, string pass, string idU, string nameL, string ISBN)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[2]/ul/li[5]/a")).Click();

            //introducir año y click para buscar 
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(idU);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[3]")).Submit();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig2\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"ListarLibrosAutor - {nameL} - {ISBN}.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba
            Assert.IsTrue(webDriver.PageSource.Contains(nameL) && webDriver.PageSource.Contains(ISBN));
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "1005", "Ediciones Balboa S.A.")]
        //[DataRow("8-893-2450", "Roberto", "1002", "Editora Escolar S.A. (Ediesco)")]
        public void T006_ListarEditoriales(string user, string pass, string idE, string nameE)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]/ul/li[1]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig2\"]")));

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"ListarLibrosAutor - {idE} - {nameE}.jpg", ScreenshotImageFormat.Jpeg);

            //verificacion de datos de la web contra datos de prueba
            Assert.IsTrue(webDriver.PageSource.Contains(idE) && webDriver.PageSource.Contains(nameE));
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "Karla", "Figueroa", "Panameña")]
        //[DataRow("8-893-2450", "Roberto", "Ignacia", "Ordoñez", "Panameña")]
        public void T007_InsertarAutor(string user, string pass, string nameA, string lastnameA, string nationality)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[1]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[1]/ul/li[1]/a")).Click();

            //input data autor 
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_A\"]/input[1]")).SendKeys(nameA);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_A\"]/input[2]")).SendKeys(lastnameA);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_A\"]/input[3]")).SendKeys(nationality);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_B_A\"]/input[2]")).Submit();

            //verificacion del alert
            textAlert = "Inserción Efectuada Exitosamente";
            simpleAlert = webDriver.SwitchTo().Alert();

            if (textAlert.Equals(simpleAlert.Text))
            {
                //click en aceptar y regresa el driver al default content 
                simpleAlert.Accept();

                //click en barra de navegacion
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]/ul/li[1]/a")).Click();

                //wait
                wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompleta\"]")));

                //screenshot
                webDriver.GetScreenshot().SaveAsFile($"InsertarAutor - {nameA} - {lastnameA} - {nationality}.jpg", ScreenshotImageFormat.Jpeg);

                //verificacion de datos de la web contra datos de prueba 
                Assert.IsTrue(webDriver.PageSource.Contains(nameA) && webDriver.PageSource.Contains(lastnameA));

            }
            else
            {
                Assert.Fail();
            }
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "Karla", "Figueroa", "Panameña")]
        public void T008_EliminarAutor(string user, string pass, string nameA, string lastnameA, string nationality)
        {
            string idA = null;

            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]/ul/li[1]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompleta\"]")));

            //foreach que recorre la tabla dinamica
            foreach (WebElement eletr in new List<IWebElement>(webDriver.FindElements(By.XPath("//*[@id=\"tcompleta\"]/tbody/tr"))))
            {
                //Console.WriteLine(eletr.Text);
                if (eletr.Text.Contains(nameA) && eletr.Text.Contains(lastnameA) && eletr.Text.Contains(nationality))
                {
                    idA = eletr.Text.Substring(0, 4);
                    break;
                }
            }

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[1]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[1]/ul/li[3]/a")).Click();

            //input id autor 
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(idA);

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"EliminarAutor - {idA} - {nameA} - {lastnameA}.jpg", ScreenshotImageFormat.Jpeg);

            //boton ok
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[3]")).Submit();

            //verificacion del alert
            textAlert = "Autor eliminado Exitosamente";
            simpleAlert = webDriver.SwitchTo().Alert();

            if (textAlert.Equals(simpleAlert.Text))
            {
                //click en aceptar y regresa el driver al default content 
                simpleAlert.Accept();

                //click en barra de navegacion
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[1]/ul/li[1]/a")).Click();

                //wait
                wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompleta\"]")));

                //verificacion de datos de la web contra datos de prueba 
                Assert.IsTrue(!webDriver.PageSource.Contains(nameA) && !webDriver.PageSource.Contains(lastnameA));

            }
            else
            {
                Assert.Fail();
            }
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "America", "203-5050", "Calle 4ta, Casa 929-B, Parque Lefevre, Panama", "Panama", "Panama")]
        public void T009_InsertarEditorial(string user, string pass, string nameE, string phoneE, string addressE, string cityE, string provinceE)
        {
            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[3]/ul/li[1]/a")).Click();

            //input data autor 
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_E\"]/input[1]")).SendKeys(nameE);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_E\"]/input[2]")).SendKeys(phoneE);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_E\"]/input[3]")).SendKeys(addressE);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_E\"]/input[4]")).SendKeys(cityE);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_I_E\"]/input[5]")).SendKeys(provinceE);
            webDriver.FindElement(By.XPath("//*[@id=\"Insert_B_E\"]/input[2]")).Submit();

            //verificacion del alert
            textAlert = "Inserción Efectuada Exitosamente";
            simpleAlert = webDriver.SwitchTo().Alert();

            if (textAlert.Equals(simpleAlert.Text))
            {
                //click en aceptar y regresa el driver al default content 
                simpleAlert.Accept();

                //click en barra de navegacion
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]/ul/li[1]/a")).Click();

                //wait
                wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig2\"]")));

                //screenshot
                webDriver.GetScreenshot().SaveAsFile($"InsertarEditorial - {nameE}.jpg", ScreenshotImageFormat.Jpeg);

                //verificacion de datos de la web contra datos de prueba 
                Assert.IsTrue(webDriver.PageSource.Contains(nameE) && webDriver.PageSource.Contains(phoneE) && webDriver.PageSource.Contains(addressE));

            }
            else
            {
                Assert.Fail();
            }
        }

        [Test]
        [TestCase("8-893-2450", "Roberto", "America", "203-5050", "Calle 4ta, Casa 929-B, Parque Lefevre, Panama", "Panama", "Panama")]
        public void T010_EliminarEditorial(string user, string pass, string nameE, string phoneE, string addressE, string cityE, string provinceE)
        {
            string idA = null;

            //tamaño de ventana y url
            webDriver.Manage().Window.Maximize();
            webDriver.Navigate().GoToUrl(webURL);
            wait = new WebDriverWait(webDriver, TimeSpan.FromMinutes(2));

            //tiempo de espera para que cargue la web
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromMinutes(2);

            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(user);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[2]")).SendKeys(pass);
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[4]")).Submit();

            //click en barra de navegacion
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]/ul/li[1]/a")).Click();

            //wait
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig2\"]")));

            //foreach que recorre la tabla dinamica
            foreach (WebElement eletr in new List<IWebElement>(webDriver.FindElements(By.XPath("//*[@id=\"tcompletabig2\"]/tbody/tr"))))
            {
                //Console.WriteLine(eletr.Text);
                if (eletr.Text.Contains(nameE) && eletr.Text.Contains(phoneE) && eletr.Text.Contains(addressE) && eletr.Text.Contains(cityE) && eletr.Text.Contains(provinceE))
                {
                    idA = eletr.Text.Substring(0, 4);
                    break;
                }
            }

            //click en barra de navegacion 
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[3]")).Click();
            webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[3]/ul/li[3]/ul/li[3]/a")).Click();

            //input id autor 
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[1]")).SendKeys(idA);

            //screenshot
            webDriver.GetScreenshot().SaveAsFile($"EliminarEditorial - {idA} - {nameE}.jpg", ScreenshotImageFormat.Jpeg);

            //boton ok
            webDriver.FindElement(By.XPath("//*[@id=\"loginform\"]/input[3]")).Submit();

            //verificacion del alert
            textAlert = "Editorial eliminada Exitosamente";
            simpleAlert = webDriver.SwitchTo().Alert();

            if (textAlert.Equals(simpleAlert.Text))
            {
                //click en aceptar y regresa el driver al default content 
                simpleAlert.Accept();

                //click en barra de navegacion
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]")).Click();
                webDriver.FindElement(By.XPath("//*[@id=\"navbar\"]/li[2]/ul/li[3]/ul/li[1]/a")).Click();

                //wait
                wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[@id=\"tcompletabig2\"]")));

                //verificacion de datos de la web contra datos de prueba 
                Assert.IsTrue(!webDriver.PageSource.Contains(nameE) && !webDriver.PageSource.Contains(phoneE) && !webDriver.PageSource.Contains(addressE));

            }
            else
            {
                Assert.Fail();
            }
        }

        [TearDown]
        public void CloseDriver()
        {
            webDriver.Quit();
        }
    }
}