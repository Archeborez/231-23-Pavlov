// Form1.Designer.cs
using System;
using System.Drawing;
using System.Windows.Forms;

namespace form_for_students
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.MaskedTextBox maskedTextBoxPhone;
        private System.Windows.Forms.Label labelSurname;
        private System.Windows.Forms.TextBox textBoxSurname;
        private System.Windows.Forms.Button buttonAdd;
        private System.Windows.Forms.Label labelPatronymic;
        private System.Windows.Forms.Label labelName;
        private System.Windows.Forms.Label labelEmail;
        private System.Windows.Forms.Label labelPhone;
        private System.Windows.Forms.TextBox textBoxPatronymic;
        private System.Windows.Forms.TextBox textBoxName;
        private System.Windows.Forms.TextBox textBoxEmail;
        private System.Windows.Forms.Label labelCourse;
        private System.Windows.Forms.Label labelGroup;
        private System.Windows.Forms.TextBox textBoxGroup;
        private System.Windows.Forms.TextBox textBoxCourse;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.Button buttonDelete;
        private System.Windows.Forms.DateTimePicker dateTimePickerBirthDate;
        private System.Windows.Forms.Label labelBirthDate;
        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem sortToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sortBySurnameToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sortByNameToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sortByGroupToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sortByBirthDateToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sortByCourseToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem saveLoadToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem saveDataToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem loadDataToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem filterToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem filterByCourseToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem filterByGroupToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem searchToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem searchBySurnameToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem searchByNameToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem importExportToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem importCsvToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem exportCsvToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem statisticsToolStripMenuItem;
        private System.Windows.Forms.Panel panelSidebar;
        private System.Windows.Forms.Panel panelHeader;
        private System.Windows.Forms.Label labelTitle;
        private System.Windows.Forms.Panel panelContent;
        private System.Windows.Forms.Panel panelDataGrid;
        private System.Windows.Forms.Panel panelForm;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        private void InitializeComponent()
        {
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle1 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle2 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle3 = new System.Windows.Forms.DataGridViewCellStyle();
            this.labelSurname = new System.Windows.Forms.Label();
            this.textBoxSurname = new System.Windows.Forms.TextBox();
            this.buttonAdd = new System.Windows.Forms.Button();
            this.labelPatronymic = new System.Windows.Forms.Label();
            this.labelName = new System.Windows.Forms.Label();
            this.labelEmail = new System.Windows.Forms.Label();
            this.labelPhone = new System.Windows.Forms.Label();
            this.textBoxPatronymic = new System.Windows.Forms.TextBox();
            this.textBoxName = new System.Windows.Forms.TextBox();
            this.textBoxEmail = new System.Windows.Forms.TextBox();
            this.labelCourse = new System.Windows.Forms.Label();
            this.labelGroup = new System.Windows.Forms.Label();
            this.textBoxGroup = new System.Windows.Forms.TextBox();
            this.textBoxCourse = new System.Windows.Forms.TextBox();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.buttonDelete = new System.Windows.Forms.Button();
            this.dateTimePickerBirthDate = new System.Windows.Forms.DateTimePicker();
            this.labelBirthDate = new System.Windows.Forms.Label();
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.sortToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sortBySurnameToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sortByNameToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sortByGroupToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sortByBirthDateToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sortByCourseToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.saveLoadToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.saveDataToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.loadDataToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.filterToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.filterByCourseToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.filterByGroupToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.searchToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.searchBySurnameToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.searchByNameToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.importExportToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.importCsvToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.exportCsvToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.statisticsToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.maskedTextBoxPhone = new System.Windows.Forms.MaskedTextBox();
            this.panelSidebar = new System.Windows.Forms.Panel();
            this.panelHeader = new System.Windows.Forms.Panel();
            this.labelTitle = new System.Windows.Forms.Label();
            this.panelContent = new System.Windows.Forms.Panel();
            this.panelDataGrid = new System.Windows.Forms.Panel();
            this.panelForm = new System.Windows.Forms.Panel();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.menuStrip1.SuspendLayout();
            this.panelHeader.SuspendLayout();
            this.panelContent.SuspendLayout();
            this.panelDataGrid.SuspendLayout();
            this.panelForm.SuspendLayout();
            this.SuspendLayout();
            
            // Обновленные цвета:
            Color primaryColor = Color.FromArgb(46, 125, 50); // Зеленый
            Color secondaryColor = Color.FromArgb(56, 142, 60); // Светло-зеленый
            Color darkColor = Color.FromArgb(30, 30, 30);
            Color lightDarkColor = Color.FromArgb(50, 50, 50);
            Color accentColor = Color.FromArgb(76, 175, 80);
            Color textColor = Color.White;
            Color errorColor = Color.FromArgb(198, 40, 40);
            
            // 
            // labelSurname
            // 
            this.labelSurname.AutoSize = true;
            this.labelSurname.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelSurname.ForeColor = textColor;
            this.labelSurname.Location = new System.Drawing.Point(21, 3);
            this.labelSurname.Name = "labelSurname";
            this.labelSurname.Size = new System.Drawing.Size(68, 17);
            this.labelSurname.TabIndex = 0;
            this.labelSurname.Text = "Фамилия:";
            // 
            // textBoxSurname
            // 
            this.textBoxSurname.BackColor = lightDarkColor;
            this.textBoxSurname.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxSurname.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxSurname.ForeColor = textColor;
            this.textBoxSurname.Location = new System.Drawing.Point(20, 23);
            this.textBoxSurname.Name = "textBoxSurname";
            this.textBoxSurname.Size = new System.Drawing.Size(250, 25);
            this.textBoxSurname.TabIndex = 1;
            // 
            // buttonAdd
            // 
            this.buttonAdd.BackColor = primaryColor;
            this.buttonAdd.Cursor = System.Windows.Forms.Cursors.Hand;
            this.buttonAdd.FlatAppearance.BorderSize = 0;
            this.buttonAdd.FlatAppearance.MouseDownBackColor = Color.FromArgb(36, 105, 40);
            this.buttonAdd.FlatAppearance.MouseOverBackColor = secondaryColor;
            this.buttonAdd.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.buttonAdd.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.buttonAdd.ForeColor = textColor;
            this.buttonAdd.Location = new System.Drawing.Point(20, 535);
            this.buttonAdd.Name = "buttonAdd";
            this.buttonAdd.Size = new System.Drawing.Size(250, 35);
            this.buttonAdd.TabIndex = 2;
            this.buttonAdd.Text = "Добавить";
            this.buttonAdd.UseVisualStyleBackColor = false;
            this.buttonAdd.Click += new System.EventHandler(this.buttonAdd_Click);
            this.buttonAdd.MouseEnter += new System.EventHandler(this.Button_MouseEnter);
            this.buttonAdd.MouseLeave += new System.EventHandler(this.Button_MouseLeave);
            // 
            // labelPatronymic
            // 
            this.labelPatronymic.AutoSize = true;
            this.labelPatronymic.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelPatronymic.ForeColor = textColor;
            this.labelPatronymic.Location = new System.Drawing.Point(20, 120);
            this.labelPatronymic.Name = "labelPatronymic";
            this.labelPatronymic.Size = new System.Drawing.Size(69, 17);
            this.labelPatronymic.TabIndex = 3;
            this.labelPatronymic.Text = "Отчество:";
            // 
            // labelName
            // 
            this.labelName.AutoSize = true;
            this.labelName.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelName.ForeColor = textColor;
            this.labelName.Location = new System.Drawing.Point(21, 60);
            this.labelName.Name = "labelName";
            this.labelName.Size = new System.Drawing.Size(38, 17);
            this.labelName.TabIndex = 4;
            this.labelName.Text = "Имя:";
            // 
            // labelEmail
            // 
            this.labelEmail.AutoSize = true;
            this.labelEmail.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelEmail.ForeColor = textColor;
            this.labelEmail.Location = new System.Drawing.Point(17, 180);
            this.labelEmail.Name = "labelEmail";
            this.labelEmail.Size = new System.Drawing.Size(133, 17);
            this.labelEmail.TabIndex = 5;
            this.labelEmail.Text = "Электронная почта:";
            // 
            // labelPhone
            // 
            this.labelPhone.AutoSize = true;
            this.labelPhone.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelPhone.ForeColor = textColor;
            this.labelPhone.Location = new System.Drawing.Point(17, 240);
            this.labelPhone.Name = "labelPhone";
            this.labelPhone.Size = new System.Drawing.Size(134, 17);
            this.labelPhone.TabIndex = 6;
            this.labelPhone.Text = "Телефонный номер:";
            // 
            // textBoxPatronymic
            // 
            this.textBoxPatronymic.BackColor = lightDarkColor;
            this.textBoxPatronymic.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxPatronymic.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxPatronymic.ForeColor = textColor;
            this.textBoxPatronymic.Location = new System.Drawing.Point(20, 140);
            this.textBoxPatronymic.Name = "textBoxPatronymic";
            this.textBoxPatronymic.Size = new System.Drawing.Size(250, 25);
            this.textBoxPatronymic.TabIndex = 7;
            // 
            // textBoxName
            // 
            this.textBoxName.BackColor = lightDarkColor;
            this.textBoxName.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxName.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxName.ForeColor = textColor;
            this.textBoxName.Location = new System.Drawing.Point(20, 80);
            this.textBoxName.Name = "textBoxName";
            this.textBoxName.Size = new System.Drawing.Size(250, 25);
            this.textBoxName.TabIndex = 8;
            // 
            // textBoxEmail
            // 
            this.textBoxEmail.BackColor = lightDarkColor;
            this.textBoxEmail.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxEmail.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxEmail.ForeColor = textColor;
            this.textBoxEmail.Location = new System.Drawing.Point(20, 200);
            this.textBoxEmail.Name = "textBoxEmail";
            this.textBoxEmail.Size = new System.Drawing.Size(250, 25);
            this.textBoxEmail.TabIndex = 9;
            // 
            // labelCourse
            // 
            this.labelCourse.AutoSize = true;
            this.labelCourse.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelCourse.ForeColor = textColor;
            this.labelCourse.Location = new System.Drawing.Point(20, 371);
            this.labelCourse.Name = "labelCourse";
            this.labelCourse.Size = new System.Drawing.Size(39, 17);
            this.labelCourse.TabIndex = 11;
            this.labelCourse.Text = "Курс:";
            // 
            // labelGroup
            // 
            this.labelGroup.AutoSize = true;
            this.labelGroup.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelGroup.ForeColor = textColor;
            this.labelGroup.Location = new System.Drawing.Point(17, 432);
            this.labelGroup.Name = "labelGroup";
            this.labelGroup.Size = new System.Drawing.Size(54, 17);
            this.labelGroup.TabIndex = 12;
            this.labelGroup.Text = "Группа:";
            // 
            // textBoxGroup
            // 
            this.textBoxGroup.BackColor = lightDarkColor;
            this.textBoxGroup.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxGroup.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxGroup.ForeColor = textColor;
            this.textBoxGroup.Location = new System.Drawing.Point(20, 452);
            this.textBoxGroup.Name = "textBoxGroup";
            this.textBoxGroup.Size = new System.Drawing.Size(250, 25);
            this.textBoxGroup.TabIndex = 13;
            // 
            // textBoxCourse
            // 
            this.textBoxCourse.BackColor = lightDarkColor;
            this.textBoxCourse.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.textBoxCourse.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.textBoxCourse.ForeColor = textColor;
            this.textBoxCourse.Location = new System.Drawing.Point(20, 391);
            this.textBoxCourse.Name = "textBoxCourse";
            this.textBoxCourse.Size = new System.Drawing.Size(250, 25);
            this.textBoxCourse.TabIndex = 14;
            // 
            // dataGridView1
            // 
            this.dataGridView1.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView1.BackgroundColor = darkColor;
            this.dataGridView1.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.dataGridView1.CellBorderStyle = System.Windows.Forms.DataGridViewCellBorderStyle.SingleHorizontal;
            this.dataGridView1.ColumnHeadersBorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.None;
            dataGridViewCellStyle1.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle1.BackColor = darkColor;
            dataGridViewCellStyle1.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle1.ForeColor = textColor;
            dataGridViewCellStyle1.Padding = new System.Windows.Forms.Padding(10, 0, 0, 0);
            dataGridViewCellStyle1.SelectionBackColor = darkColor;
            dataGridViewCellStyle1.SelectionForeColor = textColor;
            dataGridViewCellStyle1.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dataGridView1.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle1;
            this.dataGridView1.ColumnHeadersHeight = 40;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.DisableResizing;
            dataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle2.BackColor = darkColor;
            dataGridViewCellStyle2.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle2.ForeColor = textColor;
            dataGridViewCellStyle2.Padding = new System.Windows.Forms.Padding(10, 0, 0, 0);
            dataGridViewCellStyle2.SelectionBackColor = Color.FromArgb(70, 70, 70);
            dataGridViewCellStyle2.SelectionForeColor = textColor;
            dataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.False;
            this.dataGridView1.DefaultCellStyle = dataGridViewCellStyle2;
            this.dataGridView1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.dataGridView1.EnableHeadersVisualStyles = false;
            this.dataGridView1.GridColor = Color.FromArgb(80, 80, 80);
            this.dataGridView1.Location = new System.Drawing.Point(10, 10);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.RowHeadersBorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.None;
            dataGridViewCellStyle3.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle3.BackColor = darkColor;
            dataGridViewCellStyle3.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle3.ForeColor = textColor;
            dataGridViewCellStyle3.SelectionBackColor = Color.FromArgb(70, 70, 70);
            dataGridViewCellStyle3.SelectionForeColor = textColor;
            dataGridViewCellStyle3.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dataGridView1.RowHeadersDefaultCellStyle = dataGridViewCellStyle3;
            this.dataGridView1.RowHeadersVisible = false;
            this.dataGridView1.RowHeadersWidthSizeMode = System.Windows.Forms.DataGridViewRowHeadersWidthSizeMode.DisableResizing;
            this.dataGridView1.RowTemplate.Height = 35;
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(1020, 645);
            this.dataGridView1.TabIndex = 15;
            // 
            // buttonDelete
            // 
            this.buttonDelete.BackColor = errorColor;
            this.buttonDelete.Cursor = System.Windows.Forms.Cursors.Hand;
            this.buttonDelete.FlatAppearance.BorderSize = 0;
            this.buttonDelete.FlatAppearance.MouseDownBackColor = Color.FromArgb(178, 30, 30);
            this.buttonDelete.FlatAppearance.MouseOverBackColor = Color.FromArgb(218, 50, 50);
            this.buttonDelete.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.buttonDelete.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.buttonDelete.ForeColor = textColor;
            this.buttonDelete.Location = new System.Drawing.Point(20, 590);
            this.buttonDelete.Name = "buttonDelete";
            this.buttonDelete.Size = new System.Drawing.Size(250, 35);
            this.buttonDelete.TabIndex = 17;
            this.buttonDelete.Text = "Удалить";
            this.buttonDelete.UseVisualStyleBackColor = false;
            this.buttonDelete.Click += new System.EventHandler(this.buttonDelete_Click);
            this.buttonDelete.MouseEnter += new System.EventHandler(this.Button_MouseEnter);
            this.buttonDelete.MouseLeave += new System.EventHandler(this.Button_MouseLeave);
            // 
            // dateTimePickerBirthDate
            // 
            this.dateTimePickerBirthDate.CalendarFont = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.dateTimePickerBirthDate.CalendarForeColor = textColor;
            this.dateTimePickerBirthDate.CalendarMonthBackground = darkColor;
            this.dateTimePickerBirthDate.CalendarTitleBackColor = darkColor;
            this.dateTimePickerBirthDate.CalendarTitleForeColor = textColor;
            this.dateTimePickerBirthDate.CalendarTrailingForeColor = Color.FromArgb(150, 150, 150);
            this.dateTimePickerBirthDate.CustomFormat = "dd.MM.yyyy";
            this.dateTimePickerBirthDate.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.dateTimePickerBirthDate.Format = System.Windows.Forms.DateTimePickerFormat.Custom;
            this.dateTimePickerBirthDate.Location = new System.Drawing.Point(20, 333);
            this.dateTimePickerBirthDate.Name = "dateTimePickerBirthDate";
            this.dateTimePickerBirthDate.Size = new System.Drawing.Size(250, 25);
            this.dateTimePickerBirthDate.TabIndex = 18;
            // 
            // labelBirthDate
            // 
            this.labelBirthDate.AutoSize = true;
            this.labelBirthDate.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelBirthDate.ForeColor = textColor;
            this.labelBirthDate.Location = new System.Drawing.Point(20, 313);
            this.labelBirthDate.Name = "labelBirthDate";
            this.labelBirthDate.Size = new System.Drawing.Size(108, 17);
            this.labelBirthDate.TabIndex = 19;
            this.labelBirthDate.Text = "Дата рождения:";
            // 
            // menuStrip1
            // 
            this.menuStrip1.BackColor = darkColor;
            this.menuStrip1.Font = new System.Drawing.Font("Segoe UI Semibold", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.sortToolStripMenuItem,
            this.saveLoadToolStripMenuItem,
            this.filterToolStripMenuItem,
            this.searchToolStripMenuItem,
            this.importExportToolStripMenuItem,
            this.statisticsToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Padding = new System.Windows.Forms.Padding(8, 2, 0, 2);
            this.menuStrip1.Size = new System.Drawing.Size(1400, 25);
            this.menuStrip1.TabIndex = 20;
            this.menuStrip1.Text = "menuStrip1";
            // 
            // sortToolStripMenuItem
            // 
            this.sortToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.sortBySurnameToolStripMenuItem,
            this.sortByNameToolStripMenuItem,
            this.sortByGroupToolStripMenuItem,
            this.sortByBirthDateToolStripMenuItem,
            this.sortByCourseToolStripMenuItem});
            this.sortToolStripMenuItem.ForeColor = textColor;
            this.sortToolStripMenuItem.Name = "sortToolStripMenuItem";
            this.sortToolStripMenuItem.Size = new System.Drawing.Size(95, 21);
            this.sortToolStripMenuItem.Text = "Сортировка";
            // 
            // sortBySurnameToolStripMenuItem
            // 
            this.sortBySurnameToolStripMenuItem.BackColor = darkColor;
            this.sortBySurnameToolStripMenuItem.ForeColor = textColor;
            this.sortBySurnameToolStripMenuItem.Name = "sortBySurnameToolStripMenuItem";
            this.sortBySurnameToolStripMenuItem.Size = new System.Drawing.Size(193, 22);
            this.sortBySurnameToolStripMenuItem.Text = "по Фамилии";
            this.sortBySurnameToolStripMenuItem.Click += new System.EventHandler(this.sortBySurnameToolStripMenuItem_Click);
            // 
            // sortByNameToolStripMenuItem
            // 
            this.sortByNameToolStripMenuItem.BackColor = darkColor;
            this.sortByNameToolStripMenuItem.ForeColor = textColor;
            this.sortByNameToolStripMenuItem.Name = "sortByNameToolStripMenuItem";
            this.sortByNameToolStripMenuItem.Size = new System.Drawing.Size(193, 22);
            this.sortByNameToolStripMenuItem.Text = "по Имени";
            this.sortByNameToolStripMenuItem.Click += new System.EventHandler(this.sortByNameToolStripMenuItem_Click);
            // 
            // sortByGroupToolStripMenuItem
            // 
            this.sortByGroupToolStripMenuItem.BackColor = darkColor;
            this.sortByGroupToolStripMenuItem.ForeColor = textColor;
            this.sortByGroupToolStripMenuItem.Name = "sortByGroupToolStripMenuItem";
            this.sortByGroupToolStripMenuItem.Size = new System.Drawing.Size(193, 22);
            this.sortByGroupToolStripMenuItem.Text = "по Группе";
            this.sortByGroupToolStripMenuItem.Click += new System.EventHandler(this.sortByGroupToolStripMenuItem_Click);
            // 
            // sortByBirthDateToolStripMenuItem
            // 
            this.sortByBirthDateToolStripMenuItem.BackColor = darkColor;
            this.sortByBirthDateToolStripMenuItem.ForeColor = textColor;
            this.sortByBirthDateToolStripMenuItem.Name = "sortByBirthDateToolStripMenuItem";
            this.sortByBirthDateToolStripMenuItem.Size = new System.Drawing.Size(193, 22);
            this.sortByBirthDateToolStripMenuItem.Text = "по Дате рождения";
            this.sortByBirthDateToolStripMenuItem.Click += new System.EventHandler(this.sortByBirthDateToolStripMenuItem_Click);
            // 
            // sortByCourseToolStripMenuItem
            // 
            this.sortByCourseToolStripMenuItem.BackColor = darkColor;
            this.sortByCourseToolStripMenuItem.ForeColor = textColor;
            this.sortByCourseToolStripMenuItem.Name = "sortByCourseToolStripMenuItem";
            this.sortByCourseToolStripMenuItem.Size = new System.Drawing.Size(193, 22);
            this.sortByCourseToolStripMenuItem.Text = "по Курсу";
            this.sortByCourseToolStripMenuItem.Click += new System.EventHandler(this.sortByCourseToolStripMenuItem_Click);
            // 
            // saveLoadToolStripMenuItem
            // 
            this.saveLoadToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.saveDataToolStripMenuItem,
            this.loadDataToolStripMenuItem});
            this.saveLoadToolStripMenuItem.ForeColor = textColor;
            this.saveLoadToolStripMenuItem.Name = "saveLoadToolStripMenuItem";
            this.saveLoadToolStripMenuItem.Size = new System.Drawing.Size(165, 21);
            this.saveLoadToolStripMenuItem.Text = "Сохранение и загрузка";
            // 
            // saveDataToolStripMenuItem
            // 
            this.saveDataToolStripMenuItem.BackColor = darkColor;
            this.saveDataToolStripMenuItem.ForeColor = textColor;
            this.saveDataToolStripMenuItem.Name = "saveDataToolStripMenuItem";
            this.saveDataToolStripMenuItem.Size = new System.Drawing.Size(195, 22);
            this.saveDataToolStripMenuItem.Text = "Сохранить данные";
            this.saveDataToolStripMenuItem.Click += new System.EventHandler(this.saveDataToolStripMenuItem_Click);
            // 
            // loadDataToolStripMenuItem
            // 
            this.loadDataToolStripMenuItem.BackColor = darkColor;
            this.loadDataToolStripMenuItem.ForeColor = textColor;
            this.loadDataToolStripMenuItem.Name = "loadDataToolStripMenuItem";
            this.loadDataToolStripMenuItem.Size = new System.Drawing.Size(195, 22);
            this.loadDataToolStripMenuItem.Text = "Загрузить данные";
            this.loadDataToolStripMenuItem.Click += new System.EventHandler(this.loadDataToolStripMenuItem_Click);
            // 
            // filterToolStripMenuItem
            // 
            this.filterToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.filterByCourseToolStripMenuItem,
            this.filterByGroupToolStripMenuItem});
            this.filterToolStripMenuItem.ForeColor = textColor;
            this.filterToolStripMenuItem.Name = "filterToolStripMenuItem";
            this.filterToolStripMenuItem.Size = new System.Drawing.Size(96, 21);
            this.filterToolStripMenuItem.Text = "Фильтрация";
            // 
            // filterByCourseToolStripMenuItem
            // 
            this.filterByCourseToolStripMenuItem.BackColor = darkColor;
            this.filterByCourseToolStripMenuItem.ForeColor = textColor;
            this.filterByCourseToolStripMenuItem.Name = "filterByCourseToolStripMenuItem";
            this.filterByCourseToolStripMenuItem.Size = new System.Drawing.Size(139, 22);
            this.filterByCourseToolStripMenuItem.Text = "по Курсу";
            this.filterByCourseToolStripMenuItem.Click += new System.EventHandler(this.filterByCourseToolStripMenuItem_Click);
            // 
            // filterByGroupToolStripMenuItem
            // 
            this.filterByGroupToolStripMenuItem.BackColor = darkColor;
            this.filterByGroupToolStripMenuItem.ForeColor = textColor;
            this.filterByGroupToolStripMenuItem.Name = "filterByGroupToolStripMenuItem";
            this.filterByGroupToolStripMenuItem.Size = new System.Drawing.Size(139, 22);
            this.filterByGroupToolStripMenuItem.Text = "по Группе";
            this.filterByGroupToolStripMenuItem.Click += new System.EventHandler(this.filterByGroupToolStripMenuItem_Click);
            // 
            // searchToolStripMenuItem
            // 
            this.searchToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.searchBySurnameToolStripMenuItem,
            this.searchByNameToolStripMenuItem});
            this.searchToolStripMenuItem.ForeColor = textColor;
            this.searchToolStripMenuItem.Name = "searchToolStripMenuItem";
            this.searchToolStripMenuItem.Size = new System.Drawing.Size(59, 21);
            this.searchToolStripMenuItem.Text = "Поиск";
            // 
            // searchBySurnameToolStripMenuItem
            // 
            this.searchBySurnameToolStripMenuItem.BackColor = darkColor;
            this.searchBySurnameToolStripMenuItem.ForeColor = textColor;
            this.searchBySurnameToolStripMenuItem.Name = "searchBySurnameToolStripMenuItem";
            this.searchBySurnameToolStripMenuItem.Size = new System.Drawing.Size(154, 22);
            this.searchBySurnameToolStripMenuItem.Text = "по Фамилии";
            this.searchBySurnameToolStripMenuItem.Click += new System.EventHandler(this.searchBySurnameToolStripMenuItem_Click);
            // 
            // searchByNameToolStripMenuItem
            // 
            this.searchByNameToolStripMenuItem.BackColor = darkColor;
            this.searchByNameToolStripMenuItem.ForeColor = textColor;
            this.searchByNameToolStripMenuItem.Name = "searchByNameToolStripMenuItem";
            this.searchByNameToolStripMenuItem.Size = new System.Drawing.Size(154, 22);
            this.searchByNameToolStripMenuItem.Text = "по Имени";
            this.searchByNameToolStripMenuItem.Click += new System.EventHandler(this.searchByNameToolStripMenuItem_Click);
            // 
            // importExportToolStripMenuItem
            // 
            this.importExportToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.importCsvToolStripMenuItem,
            this.exportCsvToolStripMenuItem});
            this.importExportToolStripMenuItem.ForeColor = textColor;
            this.importExportToolStripMenuItem.Name = "importExportToolStripMenuItem";
            this.importExportToolStripMenuItem.Size = new System.Drawing.Size(126, 21);
            this.importExportToolStripMenuItem.Text = "Импорт/Экспорт";
            // 
            // importCsvToolStripMenuItem
            // 
            this.importCsvToolStripMenuItem.BackColor = darkColor;
            this.importCsvToolStripMenuItem.ForeColor = textColor;
            this.importCsvToolStripMenuItem.Name = "importCsvToolStripMenuItem";
            this.importCsvToolStripMenuItem.Size = new System.Drawing.Size(171, 22);
            this.importCsvToolStripMenuItem.Text = "Импорт из CSV";
            this.importCsvToolStripMenuItem.Click += new System.EventHandler(this.importCsvToolStripMenuItem_Click);
            // 
            // exportCsvToolStripMenuItem
            // 
            this.exportCsvToolStripMenuItem.BackColor = darkColor;
            this.exportCsvToolStripMenuItem.ForeColor = textColor;
            this.exportCsvToolStripMenuItem.Name = "exportCsvToolStripMenuItem";
            this.exportCsvToolStripMenuItem.Size = new System.Drawing.Size(171, 22);
            this.exportCsvToolStripMenuItem.Text = "Экспорт в CSV";
            this.exportCsvToolStripMenuItem.Click += new System.EventHandler(this.exportCsvToolStripMenuItem_Click);
            // 
            // statisticsToolStripMenuItem
            // 
            this.statisticsToolStripMenuItem.ForeColor = textColor;
            this.statisticsToolStripMenuItem.Name = "statisticsToolStripMenuItem";
            this.statisticsToolStripMenuItem.Size = new System.Drawing.Size(89, 21);
            this.statisticsToolStripMenuItem.Text = "Статистика";
            this.statisticsToolStripMenuItem.Click += new System.EventHandler(this.statisticsToolStripMenuItem_Click);
            // 
            // maskedTextBoxPhone
            // 
            this.maskedTextBoxPhone.BackColor = lightDarkColor;
            this.maskedTextBoxPhone.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.maskedTextBoxPhone.Font = new System.Drawing.Font("Segoe UI", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.maskedTextBoxPhone.ForeColor = textColor;
            this.maskedTextBoxPhone.Location = new System.Drawing.Point(20, 260);
            this.maskedTextBoxPhone.Mask = "+7 (999) 000-00-00";
            this.maskedTextBoxPhone.Name = "maskedTextBoxPhone";
            this.maskedTextBoxPhone.Size = new System.Drawing.Size(250, 25);
            this.maskedTextBoxPhone.TabIndex = 21;
            // 
            // panelSidebar
            // 
            this.panelSidebar.BackColor = darkColor;
            this.panelSidebar.Dock = System.Windows.Forms.DockStyle.Left;
            this.panelSidebar.Location = new System.Drawing.Point(0, 25);
            this.panelSidebar.Name = "panelSidebar";
            this.panelSidebar.Size = new System.Drawing.Size(60, 725);
            this.panelSidebar.TabIndex = 22;
            // 
            // panelHeader
            // 
            this.panelHeader.BackColor = primaryColor;
            this.panelHeader.Controls.Add(this.labelTitle);
            this.panelHeader.Dock = System.Windows.Forms.DockStyle.Top;
            this.panelHeader.Location = new System.Drawing.Point(60, 25);
            this.panelHeader.Name = "panelHeader";
            this.panelHeader.Size = new System.Drawing.Size(1340, 60);
            this.panelHeader.TabIndex = 23;
            // 
            // labelTitle
            // 
            this.labelTitle.AutoSize = true;
            this.labelTitle.Font = new System.Drawing.Font("Segoe UI Semibold", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.labelTitle.ForeColor = textColor;
            this.labelTitle.Location = new System.Drawing.Point(20, 15);
            this.labelTitle.Name = "labelTitle";
            this.labelTitle.Size = new System.Drawing.Size(283, 32);
            this.labelTitle.TabIndex = 0;
            this.labelTitle.Text = "Управление студентами";
            // 
            // panelContent
            // 
            this.panelContent.Controls.Add(this.panelDataGrid);
            this.panelContent.Controls.Add(this.panelForm);
            this.panelContent.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panelContent.Location = new System.Drawing.Point(60, 85);
            this.panelContent.Name = "panelContent";
            this.panelContent.Size = new System.Drawing.Size(1340, 665);
            this.panelContent.TabIndex = 24;
            // 
            // panelDataGrid
            // 
            this.panelDataGrid.Controls.Add(this.dataGridView1);
            this.panelDataGrid.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panelDataGrid.Location = new System.Drawing.Point(300, 0);
            this.panelDataGrid.Name = "panelDataGrid";
            this.panelDataGrid.Padding = new System.Windows.Forms.Padding(10);
            this.panelDataGrid.Size = new System.Drawing.Size(1040, 665);
            this.panelDataGrid.TabIndex = 1;
            // 
            // panelForm
            // 
            this.panelForm.BackColor = darkColor;
            this.panelForm.Controls.Add(this.maskedTextBoxPhone);
            this.panelForm.Controls.Add(this.labelSurname);
            this.panelForm.Controls.Add(this.textBoxSurname);
            this.panelForm.Controls.Add(this.buttonDelete);
            this.panelForm.Controls.Add(this.labelPatronymic);
            this.panelForm.Controls.Add(this.labelName);
            this.panelForm.Controls.Add(this.textBoxCourse);
            this.panelForm.Controls.Add(this.labelEmail);
            this.panelForm.Controls.Add(this.textBoxGroup);
            this.panelForm.Controls.Add(this.labelPhone);
            this.panelForm.Controls.Add(this.labelGroup);
            this.panelForm.Controls.Add(this.textBoxPatronymic);
            this.panelForm.Controls.Add(this.labelCourse);
            this.panelForm.Controls.Add(this.textBoxName);
            this.panelForm.Controls.Add(this.dateTimePickerBirthDate);
            this.panelForm.Controls.Add(this.textBoxEmail);
            this.panelForm.Controls.Add(this.labelBirthDate);
            this.panelForm.Controls.Add(this.buttonAdd);
            this.panelForm.Dock = System.Windows.Forms.DockStyle.Left;
            this.panelForm.Location = new System.Drawing.Point(0, 0);
            this.panelForm.Name = "panelForm";
            this.panelForm.Padding = new System.Windows.Forms.Padding(20);
            this.panelForm.Size = new System.Drawing.Size(300, 665);
            this.panelForm.TabIndex = 2;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = darkColor;
            this.ClientSize = new System.Drawing.Size(1400, 750);
            this.Controls.Add(this.panelContent);
            this.Controls.Add(this.panelHeader);
            this.Controls.Add(this.panelSidebar);
            this.Controls.Add(this.menuStrip1);
            this.ForeColor = textColor;
            this.MainMenuStrip = this.menuStrip1;
            this.MinimumSize = new System.Drawing.Size(1000, 600);
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Student Management System";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.panelHeader.ResumeLayout(false);
            this.panelHeader.PerformLayout();
            this.panelContent.ResumeLayout(false);
            this.panelDataGrid.ResumeLayout(false);
            this.panelForm.ResumeLayout(false);
            this.panelForm.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        private void Button_MouseEnter(object sender, EventArgs e)
        {
            Button button = sender as Button;
            if (button != null)
            {
                if (button.BackColor == primaryColor)
                {
                    button.BackColor = secondaryColor;
                }
                else if (button.BackColor == errorColor)
                {
                    button.BackColor = Color.FromArgb(218, 50, 50);
                }
            }
        }

        private void Button_MouseLeave(object sender, EventArgs e)
        {
            Button button = sender as Button;
            if (button != null)
            {
                if (button.BackColor == secondaryColor)
                {
                    button.BackColor = primaryColor;
                }
                else if (button.BackColor == Color.FromArgb(218, 50, 50))
                {
                    button.BackColor = errorColor;
                }
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            this.dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView1.ColumnHeadersDefaultCellStyle.Font = new Font("Segoe UI Semibold", 9.75F, FontStyle.Bold);
            this.dataGridView1.DefaultCellStyle.Font = new Font("Segoe UI", 9.75F);
            this.dataGridView1.EnableHeadersVisualStyles = false;
        }
    }
}