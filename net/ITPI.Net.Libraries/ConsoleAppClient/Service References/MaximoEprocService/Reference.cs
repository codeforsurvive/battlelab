﻿//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.34209
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace ConsoleAppClient.MaximoEprocService {
    
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ServiceModel.ServiceContractAttribute(Namespace="http://www.ibm.com/maximo/wsdl/EPROC_TPSCPOInterface", ConfigurationName="MaximoEprocService.EPROC_TPSCPOInterfacePortType")]
    public interface EPROC_TPSCPOInterfacePortType {
        
        // CODEGEN: Generating message contract since the wrapper namespace (http://www.ibm.com/maximo) of message CreateTPSCPORequest does not match the default value (http://www.ibm.com/maximo/wsdl/EPROC_TPSCPOInterface)
        [System.ServiceModel.OperationContractAttribute(Action="urn:processDocument", ReplyAction="*")]
        [System.ServiceModel.XmlSerializerFormatAttribute(SupportFaults=true)]
        ConsoleAppClient.MaximoEprocService.CreateTPSCPOResponse CreateTPSCPO(ConsoleAppClient.MaximoEprocService.CreateTPSCPORequest request);
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class TPSCPO_POType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private string mAXINTERRORMSGField;
        
        private MXStringType dEPARTMENTField;
        
        private MXStringType dESCRIPTIONField;
        
        private MXStringType pONUMField;
        
        private MXStringType pOSCOPEField;
        
        private MXStringType pURCHASEAGENTField;
        
        private MXLongType rEVISIONNUMField;
        
        private MXStringType sITEIDField;
        
        private MXStringType vENDORField;
        
        private TPSCPO_POLINEType[] pOLINEField;
        
        private ProcessingActionType actionField;
        
        private bool actionFieldSpecified;
        
        private string relationshipField;
        
        private string deleteForInsertField;
        
        private string transLanguageField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=0)]
        public string MAXINTERRORMSG {
            get {
                return this.mAXINTERRORMSGField;
            }
            set {
                this.mAXINTERRORMSGField = value;
                this.RaisePropertyChanged("MAXINTERRORMSG");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=1)]
        public MXStringType DEPARTMENT {
            get {
                return this.dEPARTMENTField;
            }
            set {
                this.dEPARTMENTField = value;
                this.RaisePropertyChanged("DEPARTMENT");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=2)]
        public MXStringType DESCRIPTION {
            get {
                return this.dESCRIPTIONField;
            }
            set {
                this.dESCRIPTIONField = value;
                this.RaisePropertyChanged("DESCRIPTION");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=3)]
        public MXStringType PONUM {
            get {
                return this.pONUMField;
            }
            set {
                this.pONUMField = value;
                this.RaisePropertyChanged("PONUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=4)]
        public MXStringType POSCOPE {
            get {
                return this.pOSCOPEField;
            }
            set {
                this.pOSCOPEField = value;
                this.RaisePropertyChanged("POSCOPE");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=5)]
        public MXStringType PURCHASEAGENT {
            get {
                return this.pURCHASEAGENTField;
            }
            set {
                this.pURCHASEAGENTField = value;
                this.RaisePropertyChanged("PURCHASEAGENT");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(IsNullable=true, Order=6)]
        public MXLongType REVISIONNUM {
            get {
                return this.rEVISIONNUMField;
            }
            set {
                this.rEVISIONNUMField = value;
                this.RaisePropertyChanged("REVISIONNUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=7)]
        public MXStringType SITEID {
            get {
                return this.sITEIDField;
            }
            set {
                this.sITEIDField = value;
                this.RaisePropertyChanged("SITEID");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=8)]
        public MXStringType VENDOR {
            get {
                return this.vENDORField;
            }
            set {
                this.vENDORField = value;
                this.RaisePropertyChanged("VENDOR");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute("POLINE", Order=9)]
        public TPSCPO_POLINEType[] POLINE {
            get {
                return this.pOLINEField;
            }
            set {
                this.pOLINEField = value;
                this.RaisePropertyChanged("POLINE");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public ProcessingActionType action {
            get {
                return this.actionField;
            }
            set {
                this.actionField = value;
                this.RaisePropertyChanged("action");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlIgnoreAttribute()]
        public bool actionSpecified {
            get {
                return this.actionFieldSpecified;
            }
            set {
                this.actionFieldSpecified = value;
                this.RaisePropertyChanged("actionSpecified");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string relationship {
            get {
                return this.relationshipField;
            }
            set {
                this.relationshipField = value;
                this.RaisePropertyChanged("relationship");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string deleteForInsert {
            get {
                return this.deleteForInsertField;
            }
            set {
                this.deleteForInsertField = value;
                this.RaisePropertyChanged("deleteForInsert");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string transLanguage {
            get {
                return this.transLanguageField;
            }
            set {
                this.transLanguageField = value;
                this.RaisePropertyChanged("transLanguage");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class MXStringType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private bool changedField;
        
        private bool changedFieldSpecified;
        
        private string valueField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public bool changed {
            get {
                return this.changedField;
            }
            set {
                this.changedField = value;
                this.RaisePropertyChanged("changed");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlIgnoreAttribute()]
        public bool changedSpecified {
            get {
                return this.changedFieldSpecified;
            }
            set {
                this.changedFieldSpecified = value;
                this.RaisePropertyChanged("changedSpecified");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlTextAttribute()]
        public string Value {
            get {
                return this.valueField;
            }
            set {
                this.valueField = value;
                this.RaisePropertyChanged("Value");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class POKeyType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private MXStringType sITEIDField;
        
        private MXStringType pONUMField;
        
        private MXLongType rEVISIONNUMField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=0)]
        public MXStringType SITEID {
            get {
                return this.sITEIDField;
            }
            set {
                this.sITEIDField = value;
                this.RaisePropertyChanged("SITEID");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=1)]
        public MXStringType PONUM {
            get {
                return this.pONUMField;
            }
            set {
                this.pONUMField = value;
                this.RaisePropertyChanged("PONUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(IsNullable=true, Order=2)]
        public MXLongType REVISIONNUM {
            get {
                return this.rEVISIONNUMField;
            }
            set {
                this.rEVISIONNUMField = value;
                this.RaisePropertyChanged("REVISIONNUM");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class MXLongType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private bool changedField;
        
        private bool changedFieldSpecified;
        
        private long valueField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public bool changed {
            get {
                return this.changedField;
            }
            set {
                this.changedField = value;
                this.RaisePropertyChanged("changed");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlIgnoreAttribute()]
        public bool changedSpecified {
            get {
                return this.changedFieldSpecified;
            }
            set {
                this.changedFieldSpecified = value;
                this.RaisePropertyChanged("changedSpecified");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlTextAttribute()]
        public long Value {
            get {
                return this.valueField;
            }
            set {
                this.valueField = value;
                this.RaisePropertyChanged("Value");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class MXDoubleType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private bool changedField;
        
        private bool changedFieldSpecified;
        
        private double valueField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public bool changed {
            get {
                return this.changedField;
            }
            set {
                this.changedField = value;
                this.RaisePropertyChanged("changed");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlIgnoreAttribute()]
        public bool changedSpecified {
            get {
                return this.changedFieldSpecified;
            }
            set {
                this.changedFieldSpecified = value;
                this.RaisePropertyChanged("changedSpecified");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlTextAttribute()]
        public double Value {
            get {
                return this.valueField;
            }
            set {
                this.valueField = value;
                this.RaisePropertyChanged("Value");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.ComponentModel.DesignerCategoryAttribute("code")]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public partial class TPSCPO_POLINEType : object, System.ComponentModel.INotifyPropertyChanged {
        
        private MXLongType pOLINENUMField;
        
        private MXLongType pRLINENUMField;
        
        private MXStringType pRNUMField;
        
        private MXStringType tOSITEIDField;
        
        private MXDoubleType uNITCOSTField;
        
        private ProcessingActionType actionField;
        
        private bool actionFieldSpecified;
        
        private string relationshipField;
        
        private string deleteForInsertField;
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(IsNullable=true, Order=0)]
        public MXLongType POLINENUM {
            get {
                return this.pOLINENUMField;
            }
            set {
                this.pOLINENUMField = value;
                this.RaisePropertyChanged("POLINENUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(IsNullable=true, Order=1)]
        public MXLongType PRLINENUM {
            get {
                return this.pRLINENUMField;
            }
            set {
                this.pRLINENUMField = value;
                this.RaisePropertyChanged("PRLINENUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=2)]
        public MXStringType PRNUM {
            get {
                return this.pRNUMField;
            }
            set {
                this.pRNUMField = value;
                this.RaisePropertyChanged("PRNUM");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(Order=3)]
        public MXStringType TOSITEID {
            get {
                return this.tOSITEIDField;
            }
            set {
                this.tOSITEIDField = value;
                this.RaisePropertyChanged("TOSITEID");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlElementAttribute(IsNullable=true, Order=4)]
        public MXDoubleType UNITCOST {
            get {
                return this.uNITCOSTField;
            }
            set {
                this.uNITCOSTField = value;
                this.RaisePropertyChanged("UNITCOST");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public ProcessingActionType action {
            get {
                return this.actionField;
            }
            set {
                this.actionField = value;
                this.RaisePropertyChanged("action");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlIgnoreAttribute()]
        public bool actionSpecified {
            get {
                return this.actionFieldSpecified;
            }
            set {
                this.actionFieldSpecified = value;
                this.RaisePropertyChanged("actionSpecified");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string relationship {
            get {
                return this.relationshipField;
            }
            set {
                this.relationshipField = value;
                this.RaisePropertyChanged("relationship");
            }
        }
        
        /// <remarks/>
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string deleteForInsert {
            get {
                return this.deleteForInsertField;
            }
            set {
                this.deleteForInsertField = value;
                this.RaisePropertyChanged("deleteForInsert");
            }
        }
        
        public event System.ComponentModel.PropertyChangedEventHandler PropertyChanged;
        
        protected void RaisePropertyChanged(string propertyName) {
            System.ComponentModel.PropertyChangedEventHandler propertyChanged = this.PropertyChanged;
            if ((propertyChanged != null)) {
                propertyChanged(this, new System.ComponentModel.PropertyChangedEventArgs(propertyName));
            }
        }
    }
    
    /// <remarks/>
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.Xml", "4.0.30319.34234")]
    [System.SerializableAttribute()]
    [System.Xml.Serialization.XmlTypeAttribute(Namespace="http://www.ibm.com/maximo")]
    public enum ProcessingActionType {
        
        /// <remarks/>
        Add,
        
        /// <remarks/>
        Change,
        
        /// <remarks/>
        Replace,
        
        /// <remarks/>
        Delete,
        
        /// <remarks/>
        AddChange,
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.ServiceModel.MessageContractAttribute(WrapperName="CreateTPSCPO", WrapperNamespace="http://www.ibm.com/maximo", IsWrapped=true)]
    public partial class CreateTPSCPORequest {
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=0)]
        [System.Xml.Serialization.XmlArrayItemAttribute("PO", IsNullable=false)]
        public ConsoleAppClient.MaximoEprocService.TPSCPO_POType[] TPSCPOSet;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=1)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public System.DateTime creationDateTime;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=2)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string baseLanguage;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=3)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string transLanguage;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=4)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string messageID;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=5)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string maximoVersion;
        
        public CreateTPSCPORequest() {
        }
        
        public CreateTPSCPORequest(ConsoleAppClient.MaximoEprocService.TPSCPO_POType[] TPSCPOSet, System.DateTime creationDateTime, string baseLanguage, string transLanguage, string messageID, string maximoVersion) {
            this.TPSCPOSet = TPSCPOSet;
            this.creationDateTime = creationDateTime;
            this.baseLanguage = baseLanguage;
            this.transLanguage = transLanguage;
            this.messageID = messageID;
            this.maximoVersion = maximoVersion;
        }
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
    [System.ServiceModel.MessageContractAttribute(WrapperName="CreateTPSCPOResponse", WrapperNamespace="http://www.ibm.com/maximo", IsWrapped=true)]
    public partial class CreateTPSCPOResponse {
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=0)]
        [System.Xml.Serialization.XmlArrayItemAttribute("PO", IsNullable=false)]
        public ConsoleAppClient.MaximoEprocService.POKeyType[] POMboKeySet;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=1)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public System.DateTime creationDateTime;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=2)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string baseLanguage;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=3)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string transLanguage;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=4)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string messageID;
        
        [System.ServiceModel.MessageBodyMemberAttribute(Namespace="http://www.ibm.com/maximo", Order=5)]
        [System.Xml.Serialization.XmlAttributeAttribute()]
        public string maximoVersion;
        
        public CreateTPSCPOResponse() {
        }
        
        public CreateTPSCPOResponse(ConsoleAppClient.MaximoEprocService.POKeyType[] POMboKeySet, System.DateTime creationDateTime, string baseLanguage, string transLanguage, string messageID, string maximoVersion) {
            this.POMboKeySet = POMboKeySet;
            this.creationDateTime = creationDateTime;
            this.baseLanguage = baseLanguage;
            this.transLanguage = transLanguage;
            this.messageID = messageID;
            this.maximoVersion = maximoVersion;
        }
    }
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public interface EPROC_TPSCPOInterfacePortTypeChannel : ConsoleAppClient.MaximoEprocService.EPROC_TPSCPOInterfacePortType, System.ServiceModel.IClientChannel {
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("System.ServiceModel", "4.0.0.0")]
    public partial class EPROC_TPSCPOInterfacePortTypeClient : System.ServiceModel.ClientBase<ConsoleAppClient.MaximoEprocService.EPROC_TPSCPOInterfacePortType>, ConsoleAppClient.MaximoEprocService.EPROC_TPSCPOInterfacePortType {
        
        public EPROC_TPSCPOInterfacePortTypeClient() {
        }
        
        public EPROC_TPSCPOInterfacePortTypeClient(string endpointConfigurationName) : 
                base(endpointConfigurationName) {
        }
        
        public EPROC_TPSCPOInterfacePortTypeClient(string endpointConfigurationName, string remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public EPROC_TPSCPOInterfacePortTypeClient(string endpointConfigurationName, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(endpointConfigurationName, remoteAddress) {
        }
        
        public EPROC_TPSCPOInterfacePortTypeClient(System.ServiceModel.Channels.Binding binding, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(binding, remoteAddress) {
        }
        
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Advanced)]
        ConsoleAppClient.MaximoEprocService.CreateTPSCPOResponse ConsoleAppClient.MaximoEprocService.EPROC_TPSCPOInterfacePortType.CreateTPSCPO(ConsoleAppClient.MaximoEprocService.CreateTPSCPORequest request) {
            return base.Channel.CreateTPSCPO(request);
        }
        
        public ConsoleAppClient.MaximoEprocService.POKeyType[] CreateTPSCPO(ConsoleAppClient.MaximoEprocService.TPSCPO_POType[] TPSCPOSet, ref System.DateTime creationDateTime, ref string baseLanguage, ref string transLanguage, ref string messageID, ref string maximoVersion) {
            ConsoleAppClient.MaximoEprocService.CreateTPSCPORequest inValue = new ConsoleAppClient.MaximoEprocService.CreateTPSCPORequest();
            inValue.TPSCPOSet = TPSCPOSet;
            inValue.creationDateTime = creationDateTime;
            inValue.baseLanguage = baseLanguage;
            inValue.transLanguage = transLanguage;
            inValue.messageID = messageID;
            inValue.maximoVersion = maximoVersion;
            ConsoleAppClient.MaximoEprocService.CreateTPSCPOResponse retVal = ((ConsoleAppClient.MaximoEprocService.EPROC_TPSCPOInterfacePortType)(this)).CreateTPSCPO(inValue);
            creationDateTime = retVal.creationDateTime;
            baseLanguage = retVal.baseLanguage;
            transLanguage = retVal.transLanguage;
            messageID = retVal.messageID;
            maximoVersion = retVal.maximoVersion;
            return retVal.POMboKeySet;
        }
    }
}
